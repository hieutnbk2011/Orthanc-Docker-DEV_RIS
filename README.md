# Purpose

THERE IS A DEMO RUNNING (ON AND OFF) AT:

https://dockerlaravel.medical.ky, USER:  testuser@fakedomain.com PASS:  Testing!1

This is a Orthanc Development project based upon the Osimis configuration located here:

https://bitbucket.org/osimis/orthanc-setup-samples/src/master/docker/tls-with-nginx/

See the README.md in that package for a description.

It is somewhat modified in that it currently has only one Orthanc container instead of the 3 in the package, and it has NGINX, php-fpm, mysql, postgres and a number of other features added to provide:

1.  A Laravel front-end and dev tool located in nginx-home/LaravelPortal
2.  Some additional admin tools and beginnings of an alternate auth mechanism in nginx-home, served up by NGINX.
3.  An addiitonal old RIS in nginx-home/RIS, although that is not currently part of this package because we are migrating from that to Laravel.
4.  Custom Python script that is added to Orthanc when it is created, provides for pagination, PDF creation from HTML.  Multipel PIP modules are included.

In the current setup, Remote Access is allowed and Authentication is turned off because alternate methods of access controls are under development, either through NGINX or a python plug-in in Orthanc.  Some details provides at the bottom of this note.

# Description

This demo contains:

- an Nginx container that implements TLS and a reverse proxy to 1 Orthanc Instance: pacs-1 container.


# Starting the setup

- In the `tls` folder there are config files and scripts to generate self-signed certificates that are to be copied to the containers.
- `tls` has some preconfigured entries, but tailor them to suit your needs and map the domain (CN) provided to the IP address of your local instance.  NGINX listens on port 443 of the host, and the (CN).
- It should be noted that /nginx/default.conf has the server configuration for the Docker NGINX, so the domains there need to match the generated certificate.  You'll get a warning for a self-signed cert.
- The default server on nginx is the proxy for the built in Orthanc via the /pacs-1/ route, proxied to http://pacs-1:8042, either directly via curl or via AJAX via /api/ route.  There are some hooks in there to utilize the http_auth_request nginx module for authorization, although this is not fully implement.  Just a demo.  With the python auth mechanism built into Orthanc as well that is probably better.  More discussion below.  The / route goes to the nginx-home .php files and NGINX can serve those up as well.
- The uploader.medical.ky domain server is for the Laravel front-end package.
- The myris.medical.ky domain server is for the old RIS, not included in the repo at this time, but it just maps to the /nginx-home/RIS/public directory, another composer project.
  
- First, you'll need to generate keys and certificates for all modules.  Go in the `tls` folder and type `generate-tls.sh`
- Then, you'll have to copy all keys and certificates to docker volumes that will be used by the nginx container.  In the `tls`folder, type `copy-tls-to-docker-volumes.sh`.  You might have to copy the keys again if you have trouble starting NGINX.  The most difficult part is getting NGINX to work.
- To start the setup, type: `docker-compose up --build` from the root of the project folder.

# Details

The Folder structure is:


├── LICENSE  
├── MWLFiles       Storage directory for MWL files on the host, mapped to /var/lib/orthanc/worklists in pacs-1  
├── MySQL_DB       MySQL DB on the host, mapped to /var/lib/mysql/ in mysql_db  
├── OrthancIndex   Orthanc Postgres DB on the host, mapped to /var/lib/postgresql/data on postgres_index-db   
├── OrthancStorage Orthanc Storage on the host, mapped to /var/lib/orthanc/db on pacs-1  
├── README.md  
├── docker  probably need to delete that  
├── docker-compose.yml  
├── docs for additional documentation  
├── mysql_init    Scripts to create (init.sql) and populate the required databases for mysql  
├── nginx  contains the server config for nginx  
├── nginx-home    Web directory for nginx requests that are not proxied  
├── pacs-1        The Orthanc setup files, sample dicom files, python, lua, etc  
├── php-fpm       php-fpm setup  
└── tls           self-signed certificate generator and copier  


To connect to the database(s) from the host:

1.  MySQL:  127.0.0.1, port 3333, root/root
2.  PostGres:  Should be handled internally by Orthanc, but the external port is 5555.

If you get it all started up:

1.  Orthanc:  e.g. https://nginx-tls.medical.ky/pacs-1/app/explorer.html
2.  PHP info root of NGINX PHP:  e.g. https://nginx-tls.medical.ky/phpinfo.php
3.  Laravel Dev front-end:  e.g. https://uploader.medical.ky/ password should be (sscotti@sscotti.org / fzJ2nsPai757epW (or Testing!1), after you have populated the database.  Need to work on that.
4.  API routes:  e.g.  https://nginx-tls.medical.ky/pacs-1/ &&  https://nginx-tls.medical.ky/api/ (exernal) http://pacs-1:8042/ from Docker PHP.
5.  Old RIS:  e.g.  
6.  https://myris.medical.ky/ (not in the repo currently)

The Laravel dev project does have a study browser with a PACS selector and other tools, including the beginnings of a radiology report creator and editor, see images below.  It will take some time to migrate the reporting tool, but it is partially funcitonal.

https://github.com/sscotti/Orthanc-Docker-DEV_RIS/blob/main/docs/browser.png

https://github.com/sscotti/Orthanc-Docker-DEV_RIS/blob/main/docs/devtool.png

https://github.com/sscotti/Orthanc-Docker-DEV_RIS/blob/main/docs/reporteditor.png
