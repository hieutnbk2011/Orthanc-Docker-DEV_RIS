# Using the third party `aiorun` instead of the asyncio.run()
# Some methods from https://python-hl7.readthedocs.io/en/latest/
# hl7.generate_message_control_id()
# hl7.parse_datetime(value)
#  sudo python3 -m pip install module name
# CREATE TABLE `orumessages` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT,`message` longblob,`messagetype` varchar(16) DEFAULT NULL,`ack` varchar(512) DEFAULT NULL,`timestamp` timestamp NULL DEFAULT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

import json
import requests # for sending CURL to Orthanc endpoint, https://www.w3schools.com/python/module_requests.asp, https://www.w3schools.com/python/ref_requests_post.asp
import aiorun # https://pypi.org/project/aiorun/
import asyncio # https://pypi.org/project/asyncio/
import hl7 # https://python-hl7.readthedocs.io/en/latest/
from hl7.mllp import start_hl7_server
from hl7.mllp import open_hl7_connection
import datetime
from datetime import datetime
import mysql.connector #  sudo python3 -m pip install mysql-connector-python  https://pypi.org/project/mysql-connector-python/
import base64 # part of python, https://docs.python.org/3/library/base64.html
import pdfkit # https://pypi.org/project/pdfkit/
from pdfkit import configuration
from pdfkit import from_string
# Database credentials, SQL to create table is at top
conn = mysql.connector.connect(user='root', password='root', host='127.0.0.1', database='hl7messages')

def attachPDFToStudy(uuid,type,data):

    pdfresponse = dict()
    # for later use if passing in html in the ORU message, might have to base64 encode that also when it is passed in.
    if type == "html":
        try:
            options = {
                'page-size': 'A4',
                'margin-top': '0.75in',
                'margin-right': '0.75in',
                'margin-bottom': '0.75in',
                'margin-left': '0.75in',
            }
            config = pdfkit.configuration(wkhtmltopdf="/usr/local/bin/wkhtmltopdf")
            pdf = pdfkit.from_string(data, False,options=options)
            encoded = base64.b64encode(pdf).decode()
            
        except Exception as e:
         
            pdfresponse['error'] = str(e)
            print (pdfresponse)
            #output.AnswerBuffer(json.dumps(pdfresponse, indent = 3), 'application/json')
    # base64 data passed in parsed.segments('OBX')[0][5] as base64, JVER . . ., need to extract a title from the HL7 message, maybe just the status, PRELIM, etc and name of study
    else:
    
        encoded = data
        payload = '{"Tags" : {"Modality":"OT", "SeriesDescription":"TITLE"},"Content" : "data:application/pdf;base64,' + encoded + '", "Parent":"' + uuid + '"}'
        headers = {
        }
        # uses requests, can use native orthanc methods later when part of loaded script
        pdfresponse = requests.post('http://localhost:8042/tools/create-dicom', data=payload,headers=headers)
        #output.AnswerBuffer(json.dumps(pdfresponse.content, indent = 3), 'application/json')
        print (pdfresponse)
        

async def process_hl7_messages(hl7_reader, hl7_writer):
    """This will be called every time a socket connects
    with us.
    """
    peername = hl7_writer.get_extra_info("peername")
    print(f"Connection established {peername}")
    try:
    
        while not hl7_writer.is_closing():
            hl7_message = await hl7_reader.readmessage()
            print(f'Received message\n {hl7_message}'.replace('\r', '\n'))
            # Now let's send the ACK and wait for the
            # writer to drain
            ack = hl7_message.create_ack()
            hl7_writer.writemessage(ack)
            ack = str(ack)
            await hl7_writer.drain()
            hl7_writer.close()

    except asyncio.IncompleteReadError as e:
        print(e)
        
    await hl7_writer.wait_closed()
    
    try:
    
        parsed = hl7.parse(str(hl7_message))
        messagetype = str(parsed['MSH'][0][9])
        timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        cursor = conn.cursor()
        sql = (
            "INSERT INTO orumessages(message, messagetype, ack, timestamp)"
            "VALUES (%s, %s, %s, %s)"
        )
        params = (str(hl7_message),messagetype, ack, timestamp)
        cursor.execute(sql, params)
        conn.commit()
        print(cursor.rowcount, "record inserted.")
        print(f"Connection closed {peername}")
        accession = str( parsed.segments('OBR')[0][3]);
        url = 'http://localhost:8042/tools/find'
        payload = '{"Level":"Study","Query":{"AccessionNumber":"' + accession +  '"}}'
        headers = {
    
        }
        response = requests.post('http://localhost:8042/tools/find', data=payload,headers=headers)
        response = json.loads(response.content)
        if len(response) == 0:
            print("No matches")
        else:
         print(response[0])
         attachPDFToStudy(response[0], "base64", str(parsed.segments('OBX')[0][5]))

    except Exception as e:
    
        print("Error occurred" + str(e))

async def hl7listener():

    try:
        # Start the server in a with clause to make sure we
        # close it
        async with await start_hl7_server(
            process_hl7_messages, port=2575, limit = 1024 * 512
        ) as hl7_server:
            # And now we server forever. Or until we are
            # cancelled...
            await hl7_server.serve_forever()
    except asyncio.CancelledError:
        # Cancelled errors are expected
        pass
    except Exception:
        print("Error occurred")


aiorun.run(hl7listener(), stop_on_unhandled_errors=True)


# For later sending messages

# async def hl7sender():
# 
#     message = 'MSH|^~\&|GHH LAB|ELAB-3|GHH OE|BLDG4|200202150930||ORU^R01|CNTRL-3456|P|2.4|'
#     
#     # Open the connection to the HL7 receiver.
#     # Using wait_for is optional, but recommended so
#     # a dead receiver won't block you for long
#     hl7_reader, hl7_writer = await asyncio.wait_for(
#         open_hl7_connection("127.0.0.1", 2100), #2100 for tester, 2575 default in PHP
#         timeout=10,
#     )
# 
#     hl7_message = hl7.parse(message)
# 
#     # Write the HL7 message, and then wait for the writer
#     # to drain to actually send the message
#     hl7_writer.writemessage(hl7_message)
#     await hl7_writer.drain()
#     print(f'Sent message\n {hl7_message}'.replace('\r', '\n'))
# 
#     # Now wait for the ACK message from the receiever
#     hl7_ack = await asyncio.wait_for(
#       hl7_reader.readmessage(),
#       timeout=10
#     )
#     print(f'Received ACK\n {hl7_ack}'.replace('\r', '\n'))
#     
# aiorun.run(hl7sender(), stop_on_unhandled_errors=True)    