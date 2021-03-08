FROM osimis/orthanc

# disable http bundle since we're specifying http parameters in the orthanc.json configuration file
ENV HTTP_BUNDLE_DEFAULTS=false
# disable the auth defaults since we specify them in orthanc.json
ENV AC_BUNDLE_DEFAULTS=false

COPY orthanc.json /etc/orthanc/

RUN pip3 install pydicom
RUN pip3 install pdfkit
RUN pip3 install hl7
RUN pip3 install wkhtmltopdf
RUN pip3 install mysql-connector-python
RUN pip3 install aiorun
RUN pip3 install asyncio
RUN pip3 install requests
RUN pip3 install flask

RUN mkdir /etc/orthanc/dicomFiles
COPY dicomFiles/*.* /etc/orthanc/dicomFiles/

RUN mkdir /python
# COPY python/combined.py /python, bound to folder on host where script is
# COPY lua/scriptname.lua /etc/orthanc/scriptname.lua

RUN apt-get update
RUN apt-get --assume-yes install wkhtmltopdf




