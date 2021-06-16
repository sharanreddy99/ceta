#!/bin/sh
echo "Waiting for mysql. This may take few more seconds ..."
while ! curl -o - db:3306; do
    >&2 echo "Waiting for mysql. This may take few more seconds ..."
    sleep 10
done
echo "mysql connection established..."

cd /var/www/html
php vendor/bin/phinx migrate -e production

echo -n '\n\nCeta Web Application can be accessed at the following url: '
tail -n 1 /etc/hosts | awk '{printf $1;}'
echo ':'${CETA_PHP_PORT}
echo '---------------------------------------------------------------------\n'

echo 'PHPMYADMIN can be accessed at the following url: localhost:'${CETA_PHPMYADMIN_PORT}
echo '---------------------------------------------------------------------\n'

# Start server
/usr/local/bin/apache2-foreground