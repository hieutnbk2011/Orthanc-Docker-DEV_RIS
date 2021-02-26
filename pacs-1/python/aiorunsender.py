# Using the third party `aiorun` instead of the asyncio.run()
# Some methods
# hl7.generate_message_control_id()
# hl7.parse_datetime(value)
import sys
import aiorun
import asyncio
import hl7
from hl7.mllp import open_hl7_connection
import datetime
from datetime import datetime
import mysql.connector #  sudo python3 -m pip install mysql-connector-python
#import pymysql #sudo python3 -m pip install pymysql
# conn = pymysql.connect("localhost","root","root","hl7messages" )
conn = mysql.connector.connect(user='root', password='root', host='127.0.0.1', database='hl7messages')

# need to hit Ctrl C in parent process.

async def hl7sender(messageout):

	# Open the connection to the HL7 receiver.
	# Using wait_for is optional, but recommended so
	# a dead receiver won't block you for long
	try:

		hl7_reader, hl7_writer = await asyncio.wait_for(
			open_hl7_connection("127.0.0.1", 2100), #2100 for tester, 2575 default in PHP
			timeout=10
		)

		hl7_message = hl7.parse(messageout)

		# Write the HL7 message, and then wait for the writer
		# to drain to actually send the message
		hl7_writer.writemessage(hl7_message)
		await hl7_writer.drain()
		print(f'Sent message\n{hl7_message}'.replace('\r', '\n'))
		# Now wait for the ACK message from the receiever
		hl7_ack = await asyncio.wait_for(
		  hl7_reader.readmessage(),
		  timeout=10
		)
		ack = str(hl7_ack).replace('\r', '')
		print('{"STATUS":"SUCCESS","ACK":"' + ack + '"}')
		loop = asyncio.get_running_loop()
		loop.stop()

	except asyncio.CancelledError:
		# Cancelled errors are expected
		loop.stop()
	except Exception as e:
		print('{"STATUS":"' + str(e) + '"}')
		loop.stop()


messageout = 'MSH|^~\&|GHH LAB|ELAB-3|GHH OE|BLDG4|200202150930||ORU^R01|CNTRL-3456|P|2.4\r'
messageout += 'PID|||555-44-4444||EVERYWOMAN^EVE^E^^^^L|JONES|196203520|F|||153 FERNWOOD DR.^^STATESVILLE^OH^35292||(206)3345232|(206)752-121||||AC555444444||67-A4335^OH^20030520\r'
messageout += 'OBR|1|845439^GHH OE|1045813^GHH LAB|1554-5^GLUCOSE|||200202150730||||||||555-55-5555^PRIMARY^PATRICIA P^^^^MD^^LEVEL SEVEN HEALTHCARE, INC.|||||||||F||||||444-44-4444^HIPPOCRATES^HOWARD H^^^^MD\r'
messageout += 'OBX|1|SN|1554-5^GLUCOSE^POST 12H CFST:MCNC:PT:SER/PLAS:QN||^182|mg/dl|70_105|H|||F\r'

aiorun.run(hl7sender(messageout), stop_on_unhandled_errors=True)