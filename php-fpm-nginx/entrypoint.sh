#!/bin/bash
chown -R www-data:www-data /nginx-home
exec /usr/bin/supervisord
