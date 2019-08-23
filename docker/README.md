# Laravel Docker Container Lite

A minimal Docker container to run Laravel applications. Has nginx, php 7.3,
node 11, and a handful of bash tools (listed in packages.sh).

## Quickstart

To see this in action in as few steps as possible, run the following commands. This will create a new project in your user tmp directory (you may have to create this too).  The 2nd to last step will open the app in a browser, the last step will give you a shell inside the running web container.

Tools required:
- `composer global require laravel/installer`
- wget
- docker & docker-compose

Commands:

```console
$ alias dc='docker-compose'
$ cd ~/tmp
$ laravel new test-docker-image
$ cd test-docker-image/
$ wget --quiet https://gitlab.com/ralphschindler/laravel-docker-container-lite/raw/master/docker-compose.example.yml -O docker-compose.yml
$ dc up -d
$ open http://localhost:8000
$ dc exec web bash
```

## Usage

For development, start with a `docker-compose.yml` file that utilizes this
container.  Here is an example that also launches Redis and MySQL:

```yaml
version: '2.2'

services:
  web:
    image: registry.gitlab.com/ralphschindler/laravel-docker-container-lite:latest
    environment:
      APP_NAME: my-app
      APP_ENV: local
      XDEBUG_CONFIG: remote_enable=1
      PHP_IDE_CONFIG: serverName=localhost
    ports:
      - 8000:80
    volumes:
      - .:/app
    links:
      - mysql
      - redis

  mysql:
    image: mysql:5.7
    command: mysqld --user=root --verbose --skip-sync-frm --innodb_flush_log_at_trx_commit=0 --innodb-support-xa=0 --bind-address=0.0.0.0 --query-cache-type=1
    ports:
      - 3306:3306
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: developer
      MYSQL_USER: developer
      MYSQL_PASSWORD: developer

  redis:
    image: redis:latest
```