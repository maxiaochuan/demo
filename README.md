#demo

## install

```
$ composer install
$ npm install
$ npm run build
```

## configure

### if nginx

```
server {

    listen 80;

    server_name serverName;
    root rootPath/demo/public/;

    index default.php index.php index.html index.htm;

    try_files $uri $uri/ /index.php?$args;


    error_page 404 /error.html;
    error_page 500 502 503 504 /50x.html;

    location = /50x.html {
        root html;
    }

    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000


    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### config env

```
$ cp .env.default .env
```

