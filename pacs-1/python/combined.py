import inspect
import numbers
import json
import io
import orthanc
import base64 # part of python, https://docs.python.org/3/library/base64.html
import pdfkit # https://pypi.org/project/pdfkit/, sudo python3 -m pip install pdfkit
from pdfkit import configuration
from pdfkit import from_string
import pydicom # https://github.com/pydicom/pydicom, sudo python3 -m pip install pydicom
import hl7 # https://python-hl7.readthedocs.io/en/latest/
from hl7.mllp import start_hl7_server
from hl7.mllp import open_hl7_connection
import re
import platform
import logging
import os
import sys
import smtplib
import ssl
from email.mime.text import MIMEText
import subprocess
import shutil
import mysql.connector #  sudo python3 -m pip install mysql-connector-python  https://pypi.org/project/mysql-connector-python/
import datetime
from datetime import datetime
import requests # for sending CURL to Orthanc endpoint, https://www.w3schools.com/python/module_requests.asp, https://www.w3schools.com/python/ref_requests_post.asp, sudo python3 -m pip install requests
import aiorun # https://pypi.org/project/aiorun/ # sudo python3 -m pip install aiorun, these are for HL7 for later possibly, run as a subprocess.
import asyncio # https://pypi.org/project/asyncio/ # sudo python3 -m pip install asyncio
import pprint # pretty printer

#Authorization setup , ? do not think you can redirect using something like Flask.

# from flask import Flask, redirect, request
# app = Flask(__name__)
# FROM_DOMAIN = "yourusername.pythonanywhere.com"
# TO_DOMAIN = "docker.medical.ky/phpinfo.php"
# app.run(host="localhost", port=9999)
# 
# def redirect_to_front_end():
#     return flask.redirect(TO_DOMAIN)


#  This works as a method to use an "AUTH Server" via this Python Plug-in.  The Auth server run on the NGINX server in the Docker container.
#  It uses an encrypted JWT that is created, encrypted, etc. by the composer package on the PHP server.  Here:  https://github.com/RobDWaller/ReallySimpleJWT
#

# def Filter(uri, **request):
# 
#     print('User trying to access URI: %s' % uri)
#     pprint.pprint(request)
#     authserverurl = "https://nginx/JWTauth.php"
#     sampleJWT = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJPcnRoYW5jIFBBQ1MiLCJzdWIiOiJWaWV3ZXIgVG9rZW4iLCJpYXQiOjE2MTQ3OTY1NDAsInVpZCI6MSwiZXhwIjoxNjE0Nzk2ODQwLCJkYXRhIjoidGVzdCJ9.27Y6A-Ka6jdpt1zU14LTF284klVMz_FEfF_SUnvTuD0"
#     samplePass = "Hello&MikeFooBar123"
#     samplestudyuuid = "test"
#     print('Request send to Auth Server at:' + authserverurl)
#     print('Response from Auth Server, Status Code and Headers')
#     authserver = requests.post(authserverurl, data = {'JWT':sampleJWT, "REQUEST": json.dumps(request)}, verify = False) # Should set to True with certificate, although it is all in the DOCKER.
#     print (authserver.status_code)
#     if (authserver.status_code == 401):
#         # redirect_to_front_end() ????
#         return False
#     else:
#         return True
# 
# orthanc.RegisterIncomingHttpRequestFilter(Filter)

# SEVERAL PACKAGES HERE

# 1. curl http://localhost:8042/pydicom/af1c0b10-c44ac936-74aa66e8-0c4463e0-2e98c65e
#    Demo for using Pydicom, can be extended.  Bascially returns a dump2dcm.

# 2. curl http://localhost:8042/get-configs/ALL
#    Gets Orthanc config file params, all or by a particular group;

# 3. curl http://localhost:8042/sendemail -d '{"subject":"This is a test","body":"string"}'
#    Sends an email.  Could be extended for HTML mails and other features, also callable from with the script.

# 4. curl http://localhost:8042/studies/page -d '{"Query":{"PatientName":"**","PatientBirthDate":"","PatientSex":"","PatientID":"","AccessionNumber":"","StudyDescription":"**","ReferringPhysicianName":"**","StudyDate":""},"Level":"Study","Expand":true,"MetaData":{},"pagenumber":1,"itemsperpage":5,"sortparam":"StudyDate","reverse":1,"widget":1}'
#    PAGINATION SCRIPT, SEE BELOW FOR DETAILS

# 5. curl -k -X POST -d '["AccessionNumber"]' http://localhost:8042/mwl/file/delete
#    Deletes .wl file in the Worklists Folder, could be extended to delete multiple from array of values

# 6. curl --request POST --url http://localhost:8042/mwl/file/make --data '{"MediaStorageSOPClassUID":"MediaStorageSOPClassUID","CharSet":"CharSet","AccessionNumber":"AccessionNumber","Modality":"Modality","RequestingPhysician":"RequestingPhysician","PatientName":"PatientName","PatientID":"PatientID","PatientBirthDate":"PatientBirthDate","PatientSex":"PatientSex","MedicalAlerts":"MedicalAlerts","Allergies":"Allergies","AdditionalPatientHistory":"AdditionalPatientHistory","StudyInstanceUID":"StudyInstanceUID","RequestingPhysician":"RequestingPhysician","RequestedProcedureDescription":"RequestedProcedureDescription","ScheduleStationAETitle":"ScheduleStationAETitle","ScheduledProcedureStepStartDate":"ScheduledProcedureStepStartDate","ScheduledProcedureStepStartTime":"ScheduledProcedureStepStartTime","RequestedProcedureID":"RequestedProcedureID","RequestedProcedurePriority":"RequestedProcedurePriority"}'

#    Creates a MWL .wl files and a .txt file in the Worlists Folder with a name equal to the Accession Number.  Can be
#    customized to meet needs

# 7. curl -k http://localhost:8042/pdfkit/htmltopdf -d '{"html":"This is a test","method":"string"}'
#    Creates a PDF file from raw HTML string using wkhtmltopdf pdfkit wrapper.  Requires the pip module and wkhtmltopdf installed on the system.  The Python Plugin has to be compiled with that PIP module also.

# 8. curl -k http://localhost:8042/studies/arrayIDs -d '["6efb3ff2-4cd16ca1-35cdb247-2d1c5f78-d6ba584e","79de0218-30258875-1adaa569-f71944db-a88eef7c"]'
#    Gets Array of Expanded study data for an array of uuid's, including the instance count and modalities

# 9. curl -k http://localhost:8042/patient/studycounts -d '["DEV0000001","DEV0000002"]'
#    Gets study counts for a patient ID, or array of ID's

# GET DUMP2DCM VIA PYDICOM FOR INSTANCE.

# http://localhost:8042/pydicom/af1c0b10-c44ac936-74aa66e8-0c4463e0-2e98c65e

def DecodeInstance(output, uri, **request):

    if request['method'] == 'GET':
        # Retrieve the instance ID from the regular expression (*)
        instanceId = request['groups'][0]
        # Get the content of the DICOM file
        f = orthanc.GetDicomForInstance(instanceId)
        # Parse it using pydicom
        dicom = pydicom.dcmread(io.BytesIO(f))
        # Return a string representation the dataset to the caller
        output.AnswerBuffer(str(dicom), 'text/plain')
    else:
        output.SendMethodNotAllowed('GET')

orthanc.RegisterRestCallback('/pydicom/(.*)', DecodeInstance)  # (*)


# GET ORTHANC CONFIGURATION
# curl https://sias.dev:8000/api/get-configs/ALL
# curl https://sias.dev:8000/api/get-configs/DicomModalities

def OnRest(output, uri, **request):

    try:
        config = json.loads(orthanc.GetConfiguration())
        param = request['groups'][0]
        if (param != "ALL"):
            value = config[param]
        else:
            value = config
        print(json.dumps(value, indent = 3))
        output.AnswerBuffer(json.dumps(value, indent = 3), 'application/json')

    except Exception as e:
        response = dict()
        response['error'] = str(e)
        output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')

orthanc.RegisterRestCallback('/get-configs/(.*)', OnRest)


# EMAIL NOTIFICATION FUNCTION, can be called from within script or via REST callback
# curl http://localhost:8042/sendemail -d '{"subject":"This is a test","body":"string"}'

def SendNotification(subject, body):

    msg = MIMEText(body)
    msg['Subject'] = subject
    msg['From'] = "sscotti@sscotti.org"
    msg['To'] = "sscotti@sscotti.org"
    context = ssl.create_default_context()
    server = smtplib.SMTP_SSL('sscotti.org', 465, context)
    server.login("sscotti@sscotti.org", '?ek.Z,]oB-yc=d53')
    server.sendmail("sscotti@sscotti.org", "sscotti@sscotti.org", msg.as_string())
    server.quit()

def SendEmail(output, uri, **request):

    if request['method'] != 'POST':
        output.SendMethodNotAllowed('POST')
    response = dict()
    payload = json.loads(request['body'])
    subject = payload['subject']
    body = payload['body']
    try:
        SendNotification(subject, body)
        response['status'] = "SUCCESS"
    except Exception as e:
        response['status'] = str(e)
    output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')
orthanc.RegisterRestCallback('/sendemail', SendEmail)

# BEGINNING OF STUDIES/PAGE, TAGROUP IS NICE TO HAVE JUST GENERALLY.

# curl http://localhost:8042/studies/page -d '{"Query":{"PatientName":"**","PatientBirthDate":"","PatientSex":"","PatientID":"","AccessionNumber":"","StudyDescription":"**","ReferringPhysicianName":"**","StudyDate":""},"Level":"Study","Expand":true,"MetaData":{},"pagenumber":1,"itemsperpage":5,"sortparam":"StudyDate","reverse":1,"widget":1}'

# Typical response is like below, where the first element of the array is the "pagination object", and the following elements are the Expanded Study data, with imagecount and modalities added.  Modalities is an array.

# [
#    {
#       "count": 11,
#       "widget": "<div data-url = \"/studies/page \" class = \"paginator\"><a data-page = \"1\" class = \"pageactive\" href=\"\">1</a><a data-page = \"2\" class = \"\"  href=\"\">2</a><a data-page = \"3\" class = \"\"  href=\"\">3</a><a data-page = \"4\" class = \"\"  href=\"\">4</a><a data-page = \"5\" class = \"\"  href=\"\">5</a><a data-page = \"6\" class = \"\"  href=\"\">6</a> ... <a data-page = \"11\" class = \"\" href=\"\">11</a><span class = \"totalperpage\"> Total per page:  1</span></div>",
#       "results": 1,
#       "pagenumber": 1,
#       "offset": 0,
#       "limit": 1
#    },
#    {
#       "IsStable": true,
#       "LastUpdate": "20200629T170852",
#       "PatientMainDicomTags": {
#          "PatientBirthDate": "19571116",
#          "PatientSex": "M",
#          "PatientID": "DEV0000001",
#          "OtherPatientIDs":"OtherPatientIDs",
#          "PatientName": "SCOTTI^STEPHEN^D^^"
#       },
#       "Series": [
#          "e46bfef4-2b166666-468cc957-4b942aa8-3a5c6ef8"
#       ],
#       "modalities": [
#          "CR"
#       ],
#       "ParentPatient": "fa21ff2d-33e9b60a-daedf6a0-64d018da-682fd0a4",
#       "MainDicomTags": {
#          "AccessionNumber": "DEVACC00000006",
#          "StudyDate": "20190829",
#          "StudyDescription": "XR HIP LT 1 VW",
#          "InstitutionName": "MHealth CSC",
#          "ReferringPhysicianName": "0002^Talanow^Roland",
#          "RequestingPhysician": "2VASKE^SHANNON^M^^",
#          "StudyTime": "090425",
#          "StudyID": "UC4839619",
#          "StudyInstanceUID": "2.16.840.1.114151.1052214956401694179114379854103077382390190829"
#       },
#       "Type": "Study",
#       "ID": "e8263ed6-56adfc56-a9951260-db8c21f3-c78d7103",
#       "imagecount": 1,
#       "Metadata": {
#          "LastUpdate": "20200629T170852"
#       }
#    }
# ]

def GetTagGroupFromKey(key):

    lookup =    {

    "AccessionNumber": "MainDicomTags",
    "StudyDate": "MainDicomTags",
    "AccessionNumber": "MainDicomTags",
    "StudyDescription": "MainDicomTags",
    "InstitutionName": "MainDicomTags",
    "ReferringPhysicianName": "MainDicomTags",
    "RequestingPhysician": "MainDicomTags",
    "StudyTime": "MainDicomTags",
    "StudyID": "MainDicomTags",
    "StudyInstanceUID": "MainDicomTags",
    "PatientBirthDate": "PatientMainDicomTags",
    "PatientSex": "PatientMainDicomTags",
    "PatientID": "PatientMainDicomTags",
    "PatientName": "PatientMainDicomTags"
    }
    return lookup[key]

# returns the path for a study from the answers loop, used to construct and path for the metadata query.

def GetPath(resource):
    return '/studies/%s' % resource['ID']

# Function to recursively search down tag hierarchy to find matches from the query['Tags'] passed in to studies/find
# Skip the modality tag because that takes too long for a common search, handled further down  in code when modalities
# and image counts are caluculated.
# Not currently used.
def CheckTagLevel(tags,dictlist):

        print(tags)
        print(dictlist)
        for tagitem, value in dictlist:

            if (isinstance(value, str)):
                if tagitem in tags:
                    print(tags[tagitem] + ' ' + value)
                    if (tags[tagitem] != value):
                        return False
                    else:
                        continue
                else:
                    return False
            elif (tagitem in tags.keys()):  #must be a dict
                if (CheckTagLevel(tags[tagitem][0],value.items()) == True):
                    continue
                else:
                    return False
            else:
                return False
        return True


def FindWithMetadata(output, uri, **request):

    # The "/tools/find" route expects a POST method
    if request['method'] != 'POST':
        output.SendMethodNotAllowed('POST')
    else:
        response = dict();
        # Check the Level and Generate an error response if not a Study
        # Parse the query provided by the user, and backup the "Expand" field
        query = json.loads(request['body'])
        if query['Level'] != "Study":
            response["error"] = "Can only Query Studies"
            output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')
        elif ('pagenumber' not in query) or ('itemsperpage' not in query) or not (isinstance(query['pagenumber'], int)) or not (isinstance(query['itemsperpage'], int)):
            response["error"] = "Page Number and/or Items Per Page Error"
            output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')
        else:
            modality = False
            if 'Tags' in query and "0008,0060" in query['Tags']:
                modality  = query['Tags']["0008,0060"]
                del query['Tags']["0008,0060"]
            if 'Expand' in query:
                originalExpand = query['Expand']
            else:
                originalExpand = False

            # Call the core "/tools/find" route
            query['Expand'] = True
            answers = orthanc.RestApiPost('/tools/find', json.dumps(query))

            # Loop over the matching resources, bypass the Metadata filtering if there are no params specified (i.e. len)

            filteredAnswers = []

            if 'MetaData' in query and len(query['MetaData']) > 0:

                for answer in json.loads(answers):

                    try:
                        # Read the metadata that is associated with the resource
                        # Check whether the metadata matches the regular expressions
                        # that were provided in the "Metadata" field of the user request
                        metadata = json.loads(orthanc.RestApiGet('%s/metadata?expand' % GetPath(answer)))
                        for (name, pattern) in query['MetaData'].items():
                            print("name" + name + "  pattern" + pattern)
                            if name in metadata:
                                value = metadata[name]
                            else:
                                value = ''
                            if re.match(pattern, value) == None:
                                break

                            # If all the metadata matches the provided regular
                            # expressions, add the resource to the filtered answers

                            if originalExpand:
                                answer['Metadata'] = metadata
                                filteredAnswers.append(answer)
                            else: 
                                filteredAnswers.append(answer['ID'])
                    except:
                        # The resource was deleted since the call to "/tools/find"
                        pass
            else:
                filteredAnswers = json.loads(answers)
            filteredAnswers2 = filteredAnswers
            #query['Tags']
            #added section to allow searching on any instance tag at primary or secondary level in hierarchy, for SQ tags
            if 'Tags' in query and len(query['Tags']) > 0:
                filteredAnswers2 = []
                for answer in filteredAnswers:
                    instances = json.loads(orthanc.RestApiGet('/studies/' + answer["ID"] + '/instances'))
                    instance = instances[0]["ID"]
                    tags = json.loads(orthanc.RestApiGet('/instances/'+ instance + '/tags?short'))

                    matchedall = CheckTagLevel(tags, query['Tags'].items())

                    if (matchedall == True):
                        answer['matchinginstance'] = instance
                        simplifiedtags = json.loads(orthanc.RestApiGet('/instances/'+ instance + '/simplified-tags'))
                        answer['simplifiedtags'] = simplifiedtags
                        filteredAnswers2.append(answer)
                        
            studies = []
            
            for study in filteredAnswers2:
                modalities = []
                imagecount = 0
                for seriesuuid in study['Series']:
                    series = json.loads(orthanc.RestApiGet('/series/%s' % seriesuuid))
                    # print series
                    imagecount = imagecount + len(series['Instances'])
                    if series['MainDicomTags']['Modality'] not in modalities:
                        modalities.append(series['MainDicomTags']['Modality'])
                
                study['imagecount'] = imagecount
                study['modalities'] = modalities
                study.pop('Series', None) # Get rid of the Series since not needed in response.
                print(modality if modality else "Modality Not Searched For")
                if modality:
                    if modality in study['modalities']:
                        studies.append(study)
                else:
                    studies.append(study)
                    
            # Just used the tools/find results if no Metadata
            #    curl -s https://demo.orthanc-server.com/studies/27f7126f-4f66fb14-03f4081b-f9341db2-53925988/instances | grep '"ID"' | head -n1
            # The globals are used in the GetSortParam function for the taggroup, sortparam and reverse
            # sortparam can be omitted, in which case it defaults to StudyDate
            global param
            if 'sortparam' in query:
                param = query['sortparam']
            else:
                param = 'StudyDate'
            global taggroup
            taggroup = GetTagGroupFromKey(query['sortparam'])
            global reverse
            reverse = query['reverse']
            # Sort the studies according to the "StudyDate" DICOM tag
            studiessorted = sorted(studies, key = GetSortParam, reverse=reverse)
            count = len(studiessorted)
            #default for pagenumber
            pagenumber = 1
            if 'pagenumber' in query:
                pagenumber = query['pagenumber']
            #default for itemsperpage if not in the query, which it should be
            itemsperpage = 10
            if 'itemsperpage' in query:
                itemsperpage = query['itemsperpage']
            limit = itemsperpage
            offset = (pagenumber -1) * itemsperpage
            #offset = 0
            #if 'offset' in query:
            #    offset = query['offset']
            #limit = 0
            #if 'limit' in query:
            #    limit = query['limit']
            # Truncate the list of studies
            # Pass in 0 for limit if you want to just want to list all from the offset
            if limit == 0:
                studiessorted = studiessorted[offset : ]
            else:
                studiessorted = studiessorted[offset : offset + limit]
                
            url = '/studies/page'

            # Return the truncated list of studies

            widget = ""
            if 'widget' in query:
                widget = CreateWidget(limit, pagenumber, url , count)
                #studies.insert(0,{"paginationwidget":widget})
            studiessorted.insert(0, {"widget": widget, "results":len(studiessorted), "limit":limit, "offset":offset, "pagenumber":pagenumber, "count":count})
            # Return the filtered answers in the JSON format
            if int(platform.python_version_tuple()[0]) < 3:
                logging.warning("Suggest using Python 3.x.x, using:  " + platform.python_version())
            else:
                print(platform.python_version_tuple()[0])
                logging.warning("Suggest using Python 3.x.x, using:  " + platform.python_version())
            print("Query")
            pprint.pprint(request)
            output.AnswerBuffer(json.dumps(studiessorted, indent = 3), 'application/json')

#param is the tag to sortby
#taggroup is the taggroup for the param
#defined as globals in FindWithMetadata

def ceildiv(a, b):
    return -(-a // b)
# Could extend this such that the passed in widget id/number is a selection of preconfigured widgets for pagination, since it include HTML markup.
def CreateWidget(limit, pagenumber, url, count):

    total_pages = ceildiv(count, limit);
    links = '<div data-url = "' + url +' " class = "paginator">'
    if (total_pages >= 1 and pagenumber <= total_pages):
        active = "";
        if pagenumber == 1:
            active = "pageactive"
        links += '<a data-page = "1" class = "' + active  + '" href="">1</a>'
        active = ""
        i = max(2, pagenumber - 5)
        if i > 2:
            links += " ... "
        for i in range(i, min(pagenumber + 6, total_pages)):
            if pagenumber == i:
                active = "pageactive"
            links += '<a data-page = "' + str(i) + '" class = "' + active  + '"  href="">' + str(i) + '</a>'
            active = ""
        if i != total_pages:
            links += " ... "
        if pagenumber == total_pages:
            active = "pageactive"
        links += '<a data-page = "' + str(total_pages) + '" class = "' + active + '" href="">' + str(total_pages) + '</a>'

    links += '<span class = "totalperpage"> Total per page:  ' + str(limit) + '</span>'
    links += '</div>'
    # Sends an e-mail
    # SendNotification("/studies/find request", "Just an notification")
    return links

def GetSortParam(study):
    if param in study[taggroup]:
        return study[taggroup][param]
    else:
        return ''

orthanc.RegisterRestCallback('/studies/page', FindWithMetadata)


# BEGINNING OF /mwl/file/delete

# curl -k -X POST -d '["AccessionNumber"]' http://localhost:8042/mwl/file/delete

def  DeleteMWLByAccession(output, uri, **request):
    if request['method'] != 'POST':
        output.SendMethodNotAllowed('POST')
    else:
        response = dict();
        try:
            data = json.loads(request['body'])
            # the accession_number to delete, for the filename
            accession = data[0]
            pathtoworklist = json.loads(orthanc.GetConfiguration())['Worklists']['Database'] + '/'
            filenametxt = pathtoworklist + accession + '.txt'
            filenamewl = pathtoworklist + accession + '.wl'
            if os.path.exists(filenametxt):
                os.remove(filenametxt)
                response['filenametxt'] = "true"
            else:
                response['filenametxt'] = "false"
            if os.path.exists(filenamewl):
                os.remove(filenamewl)
                response['filenamewl'] = "true"
            else:
                response['filenamewl'] = "false"
            output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')

        except Exception as e:

            response['error'] = str(e)
            output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')

orthanc.RegisterRestCallback('/mwl/file/delete(.*)', DeleteMWLByAccession)


# BEGINNING OF /mwl/file/make, MWL MAKER.

# Sample curl call

# curl --request POST --url http://localhost:8042/mwl/file/make --data '{"RAW":{"MediaStorageSOPClassUID":"MediaStorageSOPClassUID","CharSet":"CharSet","AccessionNumber":"AccessionNumber","Modality":"Modality","RequestingPhysician":"RequestingPhysician","PatientName":"PatientName","PatientID":"PatientID","PatientBirthDate":"PatientBirthDate","PatientSex":"PatientSex","MedicalAlerts":"MedicalAlerts","Allergies":"Allergies","AdditionalPatientHistory":"AdditionalPatientHistory","StudyInstanceUID":"StudyInstanceUID","RequestingPhysician":"RequestingPhysician","RequestedProcedureDescription":"RequestedProcedureDescription","ScheduleStationAETitle":"ScheduleStationAETitle","ScheduledProcedureStepStartDate":"ScheduledProcedureStepStartDate","ScheduledProcedureStepStartTime":"ScheduledProcedureStepStartTime","RequestedProcedureID":"RequestedProcedureID","RequestedProcedurePriority":"RequestedProcedurePriority"},"HL7":""}'

# curl -k http://localhost:8042/mwl/file/make -d '{"AccessionNumber":"Test","HL7":"MSH|^~\\&|TALANOW^110dc7f9-be2a-40d5-b1f4-d25ba4a9ee76^UUID|TALANOW^110dc7f9-be2a-40d5-b1f4a9ee76^UUID|AMBRA^ba7474cf-8022-4497-9c99-f4193b088fda^UUID|AMBRA^ba7474cf-8022-4497-9c99-f4193b088fda^UUID|20200707232904||ORM^O01^ORM_O01|DEVACC00000001-20200707232904|P|2.5.1|1||AL|AL|CYM|UNICODE UTF-8|en|\rPID|1|DEV0000001^^^^|DEV0000001||Scotti^Stephen^Douglas||19571116|M|||2508 Deleware St. SE^Unit 163^Minneapolis^MN^US^55414||US-6513130209^PRS^^sscotti@mac.com|US-6513130209^PRS^^sscotti@mac.com||||DEV0000001|\rPD1|||TALANOWROLANDAPI^|\rPV1||N|||||0001^Scotti^Stephen|0001^Scotti^Stephen||||||||||||||||||||||||||||||||||||20200703080000|\rORC|XO|0001^TALANOW^110dc7f9-be2a-40d5-b1f4-d25ba4a9ee76^UUID|DEVACC00000001||||^^^20200703080000^||20200707232904|||0001^Scotti^Stephen|||20200707232904|\rOBR|1|DEVACC00000001|DEVACC00000001|0001^MRI BRAIN \/ BRAIN STEM WITHOUT CONTRAST^internal_id^{\"requested_procedure_id\":\"0001\",\"group_name\":\"Neuro\",\"exam_length\":\"60\",\"exam_name\":\"MRI BRAIN \\\/ BRAIN STEM WITHOUT CONTRAST\",\"modality\":\"MR\",\"codes\":{\"type\":\"cpt\",\"nomods\":{\"code\":\"70551\",\"fee\":\"1380.60\"},\"TC\":{\"code\":\"70551:TC\",\"fee\":\"1169.28\"},\"26\":{\"code\":\"70551:26\",\"fee\":\"315.00\"}}}^MRI BRAIN \/ BRAIN STEM WITHOUT CONTRAST^internalJSON|A||||||||test|||0001^Scotti^Stephen|||AETITLE_MRI|MR||||RAD|||1^^60^20200703080000^^A^COND^TEXT^^^^|||||||||20200703080000|\rNTE|1|O|"}'


# preserve the stdout channel
# Need to populate this with values passed in via a request
# main function
#($HL7message->PID, 2, $order->patientid . '^^^CAYMANMED^^CAYMANMED'); // mrn   143560^^^^EPI, Extended Composite ID with Check Digit DT
#returns

#{
#    "mwlfilename": "AccessionNumber.wl",
#    "message": "MWL File Written:  AccessionNumber",
#    "errors": 0,
#    "txtfilename": "AccessionNumber.txt",
#    "txtfile": ""
#}

def CreateAndSave(output, uri, **request):

    if request['method'] != 'POST':
        output.SendMethodNotAllowed('POST')
    else:
    
        query = json.loads(request['body'])
        pathtodump2dcm = shutil.which("dump2dcm")
        pathtoworklist = json.loads(orthanc.GetConfiguration())['Worklists']['Database']
        
        if not os.path.exists(pathtoworklist):
            os.makedirs(pathtoworklist)

        charset = "ISO_IR 100"

        if "HL7" in query:
            message = hl7.parse(query['HL7'])
            # The hl7 PIP module is a parser and MLLP server.  Read the Docs about parsing.
            # e.g. message.segment('PID')[2][0][0][0] (note segment, not segments), field2, repetition 0, 
#MSH|^~\&|CAYMANRIS|CAYMANMED|ORTHANC|ORTHANC|20210101173210||ORM^O01^ORM_O01|2021010117321042999|P|2.5|1||AL|AL|US|UTF-8|en|
#PID|1|DEV0000005^^^CAYMANMED^^CAYMANMED|DEV0000005^^^CAYMANMED^^CAYMANMED|DEV0000005^^^CAYMANMED^^CAYMANMED|Mouse^Minnie^||20200117|F|alias||1211 Mouse lane^^Georgetown^OS^ky1-1001^KY|KY|KY-1-345-111-1111^PRS^^admin@sias.dev|-^PRS^^|Language|M||DEV0000005|
#PV1|1|O|||||0001Scotti^Stephen^MIDDELE^SUFFIX^PREFIX^DEGREE|0001Scotti^Stephen^MIDDELE^SUFFIX^PREFIX^DEGREE|||||||||||||||||||||||||||||||Cayman Medical Ltd.|||||20201230070000|
#ORC|SC|DEVACC00000005|DEVACC00000005||SC||^^^20201230070000^||20210101173210|||0001Scotti^Stephen^MIDDELE^SUFFIX^PREFIX^DEGREE||PHONE^CODE(WPN)^TYPE(PH)^EMAIL|20210101173210|
#OBR|1|DEVACC00000005|DEVACC00000005|0001^MRI BRAIN / BRAIN STEM^internal_id^{"requested_procedure_id":"0001","group_name":"Neuro","exam_length":"60","exam_name":"MRI BRAIN \/ BRAIN STEM","modality":"MR","codes":{"type":"cpt","nomods":{"code":"70551","fee":"1380.60"},"TC":{"code":"70551:TC","fee":"1169.28"},"26":{"code":"70551:26","fee":"315.00"}}}^MRI BRAIN / BRAIN STEM^internalJSON|R|20210101173210|||||||test|||0001Scotti^Stephen^MIDDELE^SUFFIX^PREFIX^DEGREE|US6513130209^CODE(WPN)^TYPE(PH)^EMAIL|||||||RAD|||1^^60^20201230070000^^R^COND^TEXT^^^^|||||||||20201230070000||||||||0001^TEXT^SYSTEM^ALT^TEXT^SYSTEM|MODID^TEXT^SYSTEM^ALT^TEXT^SYSTEM|
#NTE|1|SOURCE|COMMENT|TYPE|
#vIPC|DEVACC00000005|0001|1.3.6.1.4.1.56016.1.20201230070000|setScheduledProcedureStepId|MR|0001|setScheduledStationName|setScheduledProcedureStepLocation|AETITLE_MRI|
# h['PID.F2.R1.C1.S1'], for reading values, vs. using segments and segments, F, R, C, S
# "ID^LAST^FIRST^MIDDELE^SUFFIX^PREFIX^DEGREE"
# family name complex, given name complex, middle name, name prefix, name suffix. in dicom
            query = dict()
            print(message['PID1.F2.R1.C1'])
            query['AccessionNumber'] = str(message.segments('OBR')[0][3]); #field 3 of first obr
            query['Modality'] = str(message.segments('IPC')[0][5]);  #field 4 of first IPC
            query['InstitutionName'] = str(message.segment('PV1')[39]); #field 39 of first PV!
            query['ReferringPhysiciansName'] = str(message.segment('PV1')[8][0][0]) + ':' + str(message.segment('PV1')[8][0][1]) + '^' + str(message.segment('PV1')[8][0][2]) + '^' + str(message.segment('PV1')[8][0][3]) + '^' + str(message.segment('PV1')[8][0][5]) + '^' + str(message.segment('PV1')[8][0][4]) + ',' + str(message.segment('PV1')[8][0][6]) # ReferringPhysiciansName
            query['PatientName'] = str(message.segment('PID')[5]); #field 5
            query['PatientID'] = str(message.segment('PID')[2][0][0]); #field 2, first R, component 0
            query['PatientBirthDate'] = str(message.segment('PID')[7]);
            query['PatientSex'] = str(message.segment('PID')[8]);
            query['PatientAddress'] = str(message.segment('PID')[11]);
            query['PatientTelephoneNumbers'] = str(message.segment('PID')[13]);
            query['PatientTelecomInformation'] = str(message.segment('PID')[14]);
            query['MedicalAlerts'] = "" # message.segments('OBR')[0][8];
            query['Allergies'] = ""# message.segments('OBR')[0][8];
            query['AdditionalPatientHistory'] = str(message.segments('OBR')[0][13]) # message.segments('OBR')[0][8];
            query['StudyInstanceUID'] = str(message.segments('IPC')[0][3]) #
            query['RequestingPhysician'] = str(message.segment('PV1')[8]) # RequestingPhysician
            query['RequestedProcedureDescription'] = str(message.segments('OBR')[0][4][0][1])
            query['ScheduleStationAETitle'] = str(message.segments('IPC')[0][9])
            query['ScheduledProcedureStepStartDate'] = str(message.segments('OBR')[0][36])[:8]
            query['ScheduledProcedureStepStartTime'] = str(message.segments('OBR')[0][36])[-6:]
            query['RequestedProcedureID'] = str(message.segments('OBR')[0][4][0][0])
            query['RequestedProcedurePriority'] =str(message.segments('OBR')[0][5])
            query['MediaStorageSOPClassUID'] = "NONE" # might need this
            query['PhysicianIDforSequence'] =str(message.segment('PV1')[8][0][0])
            query['PersonTelephoneNumbers'] =str(message.segments('OBR')[0][17])
            query['PersonTelecomInformation'] = str(message.segments('OBR')[0][17])

        mwl = [];
        mwl.append("# Dicom-File-Format")
        mwl.append("")
        mwl.append("# Dicom-Meta-Information-Header")
        mwl.append("(0002,0000) UL 202                                        # FileMetaInformationGroupLength")
        mwl.append("(0002,0001) OB 00\\01                                     # FileMetaInformationVersion")
        mwl.append("(0002,0002) UI [" + query['MediaStorageSOPClassUID'] + "] # MediaStorageSOPClassUID")
        mwl.append("(0002,0003) UI [1.2.276.0.7230010.3.1.4.2831176407.11154.1448031138.805061] # MediaStorageSOPInstanceUID")
        mwl.append("(0002,0010) UI [LittleEndianExplicit]                     # TransferSyntaxUID")
        mwl.append("(0002,0012) UI [1.2.276.0.7230010.3.0.3.6.0]             # ImplementationClassUID")
        mwl.append("(0002,0013) SH [OFFIS_DCMTK_360]                         # ImplementationVersionName")
        mwl.append("")
        mwl.append("# Dicom-Data-Set")
        mwl.append("(0008,0005) CS [" +charset + "]                  # SpecificCharacterSet")
        mwl.append("(0008,0050) SH [" + query['AccessionNumber'] + "]          # AccessionNumber")
        mwl.append("(0008,0060) CS [" + query['Modality'] + "]                 # Modality")
        mwl.append("(0008,0080) LO [" + query['InstitutionName'] + "]          # InstitutionName")
        # PN format is last,first,middle,prefix,suffix, HL7 format is "ID^LAST^FIRST^MIDDLE^SUFFIX^PREFIX^DEGREE"
        # Want this to be ID:Last^First^Middle^Prefix^Suffix for DICOM
        mwl.append("(0008,0090) PN [" + query['ReferringPhysiciansName'] + "]      # ReferringPhysiciansName")
        mwl.append("(0008,1030) LO  [" + query['RequestedProcedureDescription'] + "]      # RequestedProcedureDescription")
        
        mwl.append("(0010,0010) PN [" + query['PatientName'] + "]              # PatientName")
        mwl.append("(0010,0020) LO [" + query['PatientID'] + "]                # PatientID")
        mwl.append("(0010,0030) DA [" + query['PatientBirthDate'] + "]         # PatientBirthDate")
        mwl.append("(0010,0040) CS [" + query['PatientSex'] + "]               # PatientSex")
        
        mwl.append("(0010,1040) LO [" + query['PatientAddress'] + "]               # PatientAddress")
        mwl.append("(0010,2154) SH [" + query['PatientTelephoneNumbers'] + "]               # PatientTelephoneNumbers")
        mwl.append("(0010,2155) LT [" + query['PatientTelecomInformation'] + "]               # PatientTelecomInformation")
        
        mwl.append("(0010,2000) LO [" + query['MedicalAlerts'] + "]            # MedicalAlerts")
        mwl.append("(0010,2110) LO [" + query['Allergies'] + "]                # Allergies")
        mwl.append("(0010,21B0) LT [" + query['AdditionalPatientHistory'] + "] # AdditionalPatientHistory")
        mwl.append("(0020,000d) UI [" + query['StudyInstanceUID'] + "]         # StudyInstanceUID")
        mwl.append("(0020,0010) SH [" + query['RequestedProcedureID'] + "]         # StudyID")
        mwl.append("(0032,1060) LO [" + query['RequestedProcedureDescription'] + "]        #  RequestedProcedureDescription")
        #mwl.append("(0040,0001) AE [" + query['ScheduleStationAETitle'] + "]               #  ScheduleStationAETitle")
        #mwl.append("(0040,0002) DA [" + query['ScheduledProcedureStepStartDate'] + "]      #  ScheduledProcedureStepStartDate")
        #mwl.append("(0040,0003) TM [" + query['ScheduledProcedureStepStartTime'] + "]      #  ScheduledProcedureStepStartTime")
        mwl.append("(0040,1001) SH [" + query['RequestedProcedureID'] + "]                 # RequestedProcedureID")
        mwl.append("(0040,1003) SH [" + query['RequestedProcedurePriority'] + "]           # RequestedProcedurePriority")
        
        mwl.append("(0040,0100) SQ (Sequence with explicit length #=1)           # ScheduledProcedureStepSequence")
        mwl.append("(fffe,e000) na (Item with explicit length #=6)           # Item")
        mwl.append("(0040,0001) AE [" + query['ScheduleStationAETitle'] + "]           # ScheduledStationAETitle")
        mwl.append("(0040,0002) DA [" + query['ScheduledProcedureStepStartDate'] + "]           # ScheduledProcedureStepStartDate")
        mwl.append("(0040,0003) TM [" + query['ScheduledProcedureStepStartTime'] + "]           # ScheduledProcedureStepStartTime")
        mwl.append("(0040,0007) LO [" + query['RequestedProcedureDescription'] + "]           # ScheduledProcedureStepDescription")
        mwl.append("(0040,0009) SH [" + query['RequestedProcedureID'] + "]           # ScheduledProcedureStepID")
        mwl.append("(0008,0060) CS [" + query['Modality'] + "]           # Modality")
        mwl.append("(fffe,e00d) na (ItemDelimitationItem for re-encoding)   #   0, 0 ItemDelimitationItem")
        mwl.append("(fffe,e0dd) na (SequenceDelimitationItem for re-encod.) #   0, 0 SequenceDelimitationItem")

        mwl.append("(0008,0096) SQ (Sequence with explicit length #=1)           # ReferringPhysicianIdentificationSequence")
        mwl.append("(fffe,e000) na (Item with explicit length #=4)           # Item")
        mwl.append("(0008,0080) LO [" + query['InstitutionName'] + "]           # InstitutionName")
        mwl.append("(0040,1101) SQ (Sequence with explicit length #=1)           # PersonIdentificationCodeSequence")
        mwl.append("(fffe,e000) na (Item with explicit length #=3)           # Item")
        mwl.append("(0008,0100) SH [" + query['PhysicianIDforSequence'] + "]           # CodeValue")
        mwl.append("(0008,0102) SH [L]           # CodingSchemeDesignator")
        mwl.append("(0008,0104) LO [Local Code]           # CodeMeaning")
        mwl.append("(fffe,e00d) na (ItemDelimitationItem for re-encoding)           # ItemDelimitationItem")
        mwl.append("(fffe,e0dd) na (SequenceDelimitationItem for re-encoding)           # SequenceDelimitationItem")
        mwl.append("(0040,1103) LO [" + query['PersonTelephoneNumbers'] + "]           # PersonTelephoneNumbers")
        mwl.append("(0040,1104) LT [" + query['PersonTelecomInformation'] + "]           # PersonTelecomInformation, [Phone^WPN^CP^email]")
        mwl.append("(fffe,e00d) na (ItemDelimitationItem for re-encoding)           # ItemDelimitationItem")
        mwl.append("(fffe,e0dd) na (SequenceDelimitationItem for re-encoding.)           # SequenceDelimitationItem")

        try:
            errorstatus = False
            response = dict()
            filename = pathtoworklist + '/' + query['AccessionNumber']
            returnedtext = ""
            original = sys.stdout
            for line in mwl:
                returnedtext = returnedtext + line + "\n"

            with open(filename + ".txt", 'w+') as filehandle:
                # set the new output channel
                sys.stdout = filehandle
                for line in mwl:
                    print(line)
                # restore the old output channel
                sys.stdout = original
                filehandle.close()
                subprocess.Popen(pathtodump2dcm +' -F +te ' + filename + ".txt " + filename + ".wl", shell = True)
                # raise Exception("Testing Error.") 
                
        except Exception as e:
        
            errorstatus = True
            response['error'] =  str(e)
            response['status'] = 'Problem with MWL:  ' + query['AccessionNumber']

    if errorstatus == False:
        response['status'] = 'MWL File Written  ' + query['AccessionNumber']
        response['error'] =  "OK"
    output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')

orthanc.RegisterRestCallback('/mwl/file/make', CreateAndSave)

# Format for Server Error in response
# HttpError    "Internal Server Error"
# HttpStatus    500
# Message    "Error encountered within the plugin engine"
# Method    "POST"
# OrthancError    "Error encountered within the plugin engine"
# OrthancStatus    1
# Uri    "/pdfkit/htmltopdf"

# BEGINNING OF PDF FROM HTML

# curl -k http://localhost:8042/pdfkit/htmltopdf -d '{"html":"<p>It\’s also a very good practice to split your configuration files per topic.  In example, have a <code class=\"docutils literal\"><span class="pre">dicom.json</span></code> for everything that is related to DICOM, a <code class="docutils literal"><span class="pre">http.json</span></code> for all HTTP related configurations, one file per plugin...This is how the configuration files are provided with the Windows Installer.</p>","method":"html","title":"HTML TO PDF, Sample Report","studyuuid":"e6596260-fdf91aa9-0257a3c2-4778ebda-f2d56d1b","return":1,"attach":1}'

# curl -k http://localhost:8042/pdfkit/htmltopdf -d '{"method":"base64","title":"BASE64 TO PDF","studyuuid":"e6596260-fdf91aa9-0257a3c2-4778ebda-f2d56d1b","base64":"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PDAwNjg+IDwwMDY5PiA8MDA3Mz4gPDAwMDk+IDwwMDYxPiA8MDA3ND4gPDAwNjU+IF0KZW5kYmZyYW5nZQplbmRjbWFwCkNNYXBOYW1lIGN1cnJlbnRkaWN0IC9DTWFwIGRlZmluZXJlc291cmNlIHBvcAplbmQKZW5kCgplbmRzdHJlYW0KZW5kb2JqCjYgMCBvYmoKPDwgL1R5cGUgL0ZvbnQKL1N1YnR5cGUgL1R5cGUwCi9CYXNlRm9udCAvVGltZXNOZXdSb21hblBTTVQKL0VuY29kaW5nIC9JZGVudGl0eS1ICi9EZXNjZW5kYW50Rm9udHMgWzE0IDAgUl0KL1RvVW5pY29kZSAxNSAwIFI+PgplbmRvYmoKMiAwIG9iago8PAovVHlwZSAvUGFnZXMKL0tpZHMgClsKNSAwIFIKXQovQ291bnQgMQovUHJvY1NldCBbL1BERiAvVGV4dCAvSW1hZ2VCIC9JbWFnZUNdCj4+CmVuZG9iagp4cmVmCjAgMTcKMDAwMDAwMDAwMCA2NTUzNSBmIAowMDAwMDAwMDA5IDAwMDAwIG4gCjAwMDAwMDQ3ODUgMDAwMDAgbiAKMDAwMDAwMDE2MyAwMDAwMCBuIAowMDAwMDAwMjU4IDAwMDAwIG4gCjAwMDAwMDAzNDQgMDAwMDAgbiAKMDAwMDAwNDY0MiAwMDAwMCBuIAowMDAwMDAwMjk1IDAwMDAwIG4gCjAwMDAwMDA2NTAgMDAwMDAgbiAKMDAwMDAwMDk0NyAwMDAwMCBuIAowMDAwMDAwNDY0IDAwMDAwIG4gCjAwMDAwMDA2MzAgMDAwMDAgbiAKMDAwMDAwMDk2NiAwMDAwMCBuIAowMDAwMDAxMjI3IDAwMDAwIG4gCjAwMDAwMDM5MTcgMDAwMDAgbiAKMDAwMDAwNDE3MCAwMDAwMCBuIAowMDAwMDAzODk2IDAwMDAwIG4gCnRyYWlsZXIKPDwKL1NpemUgMTcKL0luZm8gMSAwIFIKL1Jvb3QgNyAwIFIKPj4Kc3RhcnR4cmVmCjQ4ODMKJSVFT0YK","return":1,"attach":1}'
# Modality is non-standard for REPORT, with the status PRELIM, FINAL, ADDENDUM, OperatorsName is "ID"
# 1.2.840.10008.5.1.4.1.1.104.1 is SOP CLASS for Encapsulated PDF IOD /  "SOPClassUID":"1.2.840.10008.5.1.4.1.1.104.1"
def attachbase64pdftostudy(query):

    attachresponse = dict()

    if query['studyuuid'] != "":
        print(query)
        query = '{"Tags" : {"Modality":"SR", "Manufacturer": "REPORT", "OperatorsName":"' + query['author'] + '", "SeriesDescription":"' + query['title'] + '","SOPClassUID":"1.2.840.10008.5.1.4.1.1.104.1"},"Content" : "data:application/pdf;base64,' + query['base64'] + '", "Parent":"' + query['studyuuid']+ '"}'
        temp = orthanc.RestApiPost('/tools/create-dicom',query)
        attachresponse['status'] = json.loads(temp)
        attachresponse['error'] = "false"
    else:
        attachresponse['error'] = "Missing UUID for parent study."
        
    return attachresponse;

def getpdf(query, output):

    response = dict()

    if query['method'] == "html":

        try:
            options = {
                'page-size': 'Letter',
                'margin-top': '0.75in',
                'margin-right': '0.75in',
                'margin-bottom': '0.75in',
                'margin-left': '0.75in',
            }
            pathtobinary = shutil.which("wkhtmltopdf")
            config = pdfkit.configuration(wkhtmltopdf=pathtobinary)
            pdf = pdfkit.from_string(query['html'], False,options=options)
            encoded = base64.b64encode(pdf).decode()
            # If attach flag is 1 then attach it to the studyuuid

            if query['attach'] == 1:
                query['base64'] = encoded
                response['attachresponse'] = attachbase64pdftostudy(query)
            if query['return'] == 1:
                response['base64'] = encoded
            output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')

        except Exception as e:

            response['error'] = str(e)
            output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')

    elif query['method'] == "base64":
        response['attachresponse'] = attachbase64pdftostudy(query)
        output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')
    else:
        response['error'] = "Invalid Method"
        output.AnswerBuffer(json.dumps(response, indent = 3), 'application/json')

def HTMLTOPDF(output, uri, **request):

    if request['method'] != 'POST':
        output.SendMethodNotAllowed('POST')
    else:
        #print(request['body'])
        query = json.loads(request['body']) # allows control characters ?
        pdf = getpdf(query, output)

orthanc.RegisterRestCallback('/pdfkit/htmltopdf', HTMLTOPDF)

# GETS ALL STUDIES FROM AN ARRAY OF STUDY ID'S, also add the actual instances count and modalities in the study

# e.g. curl -k http://localhost:8042/studies/arrayIDs -d '["6efb3ff2-4cd16ca1-35cdb247-2d1c5f78-d6ba584e","79de0218-30258875-1adaa569-f71944db-a88eef7c"]'

def getStudiesByIDArray(output, uri, **request):

    if request['method'] != 'POST':
        output.SendMethodNotAllowed('POST')
    else:
        answers = []
        studies = json.loads(request['body'])
        for uuid in studies:
            study = json.loads(orthanc.RestApiGet('/studies/' + uuid))
            modalities = []
            imagecount = 0
            for series in study['Series']:
                seriesdata = json.loads(orthanc.RestApiGet('/series/%s' % series))
                imagecount = imagecount + len(seriesdata['Instances'])
                if seriesdata['MainDicomTags']['Modality'] not in modalities:
                    modalities.append(seriesdata['MainDicomTags']['Modality'])
            study['imagecount'] = imagecount
            study['modalities'] = modalities
            answers.append(study)
        output.AnswerBuffer(json.dumps(answers, indent = 3), 'application/json')

orthanc.RegisterRestCallback('/studies/arrayIDs', getStudiesByIDArray)


# GETS STUDYCOUNT for an array of patientid's.
# e.g. curl -k http://localhost:8042/patient/studycounts -d '["DEV0000001","DEV0000002"]'
# Returns e.g.:  {"DEV0000001": 4, "DEV0000002": 3}

def getPatientStudyCounts(output, uri, **request):

    if request['method'] != 'POST':
        output.SendMethodNotAllowed('POST')
    else:
        answers = dict();
        patients = json.loads(request['body'])
        for patient in patients:
            query = '{"Level":"Study","Expand":false,"Query":{"PatientID":"' + patient +  '"}}'
            answers[patient] = len(json.loads(orthanc.RestApiPost('/tools/find',query)))
        output.AnswerBuffer(json.dumps(answers, indent = 3), 'application/json')
orthanc.RegisterRestCallback('/patient/studycounts', getPatientStudyCounts)

# inspect the python API of the "orthanc" module
# import inspect
# import orthanc
# import numbers

for (name, obj) in inspect.getmembers(orthanc):
    if inspect.isroutine(obj):
        print('Function %s():\n  Documentation: %s\n' % (name, inspect.getdoc(obj)))

    elif inspect.isclass(obj):
        print('Class %s:\n  Documentation: %s' % (name, inspect.getdoc(obj)))

        # Loop over the members of the class
        for (subname, subobj) in inspect.getmembers(obj):
            if isinstance(subobj, numbers.Number):
                print('  - Enumeration value %s: %s' % (subname, subobj))
            elif (not subname.startswith('_') and
                inspect.ismethoddescriptor(subobj)):
                print('  - Method %s(): %s' % (subname, inspect.getdoc(subobj)))
        print('')
