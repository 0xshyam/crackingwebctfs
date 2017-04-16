# Cracking Web CTFs

This document describes how you can setup the CTFs on your local machine/VM to play around. This document is accompanied by a solutions document as well.

## Setup

There are 8 levels in this release.

Level 1: level1<br />
Level 2: 0966615f9af15abfa9bd1ef405b42aef<br />
Level 3: 70e6766da6d53898bcd7766a04175836<br />
Level 4: 767ca3fb84576846dc53d9efdd51c339<br />
Level 5: 2da51fcf5250842da9426bdcfcd8bbc2 (Hackim Web 100)<br />
Level 6: 4f9361b0302d4c2f2eb1fc308587dfd6 (Hackim Web 200)<br />
Level 7: bb6df1e39bd297a47ed0eeaea9cac7ee (Hackim Web 400)<br />
Level 8: b7ebfe2a47f711a7b2b5bff057600a2c (Hackim Web 500)<br />

## Pre-reqs

**Note:** You can set this up on a different webserver as well, but this document contains instructions for nginx+php7.0+mysql.

**Step 1:** Install nginx and php7.0 and mysql-server. Here is a good resource: <https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-in-ubuntu-16-04>
<br /><br />
**Step 2:** Clone the 8 ctf levels and the 2 config directories (web200private and web500private) in `/var/www/html`
<br/><br />
**Step 3:** The `/etc/nginx/nginx.conf` is given below:

```
user www-data;
worker_processes auto;
pid /run/nginx.pid;

events {
        worker_connections 768;
}

http {
        
        sendfile on;
        tcp_nopush on;
        tcp_nodelay on;
        keepalive_timeout 65;
        types_hash_max_size 2048;
        server_tokens off;

        include /etc/nginx/mime.types;
        default_type application/octet-stream;

        ssl_protocols TLSv1 TLSv1.1 TLSv1.2; # Dropping SSLv3, ref: POODLE
        ssl_prefer_server_ciphers on;
        
        access_log /var/log/nginx/access.log;
        error_log /var/log/nginx/error.log;
        
        gzip on;
        gzip_disable "msie6";
        
        application/javascript text/xml application/xml application/xml+rss text/javascript;
        
        include /etc/nginx/conf.d/*.conf;
        include /etc/nginx/sites-enabled/*;

}
```

**Step 4:** The `/etc/nginx/sites-enabled/webctf` is given below:

```
server {
    listen 80;
    listen [::]:80 default_server;

    root /var/www/html;
    index index.php index.html index.htm index.nginx-debian.html;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    location /0966615f9af15abfa9bd1ef405b42aef/tokyohotel {
        autoindex on;
    }
}

```
**Step 5:** Install the gd and mcrypt module for php. These commands worked for me:
```
apt-get install php7.0-gd
apt-get install mcrypt php7.0-mcrypt 
```

**Step 6:** Edit `/etc/php/7.0/fpm/php.ini` to disable `allow_url_fopen` and `allow_url_include`:

```
allow_url_fopen = Off
allow_url_include = Off
```

**Step 7:** Run the following queries in MySQL to setup the users for some of the levels:
```
CREATE USER 'nonroot'@'%' IDENTIFIED BY PASSWORD '*628FA1DF6BE51A340F635D86203E4B16606EBDC4';
GRANT SELECT ON hackimweb500.* TO 'nonroot'@'%';

CREATE USER 'ulanbator'@'%' IDENTIFIED BY PASSWORD '*3847E6B7055AE68EBEC875D81EF80D110DBB961E';
GRANT SELECT ON hackimweb200.* TO 'ulanbator'@'%';
GRANT INSERT ON hackimweb200.* TO 'ulanbator'@'%';

CREATE USER 'newton'@'%' IDENTIFIED BY PASSWORD '*F9A4F3ADAF33A64101AA71BD5E193ED691F90944';
GRANT SELECT ON hackimweb400.* TO 'newton'@'%';
```

**Step 8:** Import the sql file at `web500private/THISISTHEDBFORLEVELWEB500-DUMDUM.sql` and `web200private/THISISTHEDBFORLEVELWEB200-DUMDUM.sql`. The following command can be used:
```
mysql -u root -p < filename.sql
```

**Step 9:** Create a new user called `james` and in the user's home directory `/home/james/` add a file called `flag.txt`. The contents of the file is: `The flag is: 767ca3fb84576846dc53d9efdd51c339`

**Step 10:** Create a index.html in webroot outside all the level folders and put the following html in it:
```
<html>
<body onload=window.location.assign('/level1')>
</body>
</html>
```
**Step 11:** Browse to `http://ip-of-ctfserver/` to be redirected to `/level1`. You can now begin!

## Get in touch!
- [Twitter @riyazwalikar](https://twitter.com/riyazwalikar)
- [Blog](https://ibreak.software/)

### Happy Hacking!


