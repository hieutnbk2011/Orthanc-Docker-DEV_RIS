# Orthanc-Docker-DEV_RIS
# Coming Soon:  Integrated Docker Compose Package with:

  1.  Orthanc with PIP modules for python, custom script and wkhtmltopdf for PDF file creation.
  2.  Postgres
  3.  MySQL
  4.  NGINX with some management tools, wkhtmltopdf and dcmtk.
  5.  PHP-FPM
  6.  Laravel Front End having Dev Tools and Study Browser
  7.  Primitive RIS for migration to the Laravel Framework

Full instructions to follow, but after cloning, checking out or downloading, navigate to the root of the project and:
  run docker-compose up --build.

It will take quite awhile to build the container.  There may be some tweaking that can be done to improve that.  The Postgres database is for Orthanc, and the Index and Storage are on the host in the root project folder under OrthancIndex and OrthancStorage.  MWL files are also mapped to the host and to the container MWL fodler.  MySQL database is mapped to the host MySQL_DB folder at the root of the host folder.  There are a number of other setups and .sql files that are explained later.

Expect that by 1 March 2021 a working version will be here.
