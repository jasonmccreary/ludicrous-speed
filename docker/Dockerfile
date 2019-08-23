FROM phusion/baseimage:0.11

ENV TERM="xterm-256color" \
    LC_ALL="en_US.UTF-8" \
    LANG="en_US.UTF-8" \
    APP_NAME="home" \
    COMPOSER_ALLOW_SUPERUSER="1" \
    APP_ENV="production" \
    PATH="$PATH:/app/vendor/bin:/app/node_modules/.bin:/app"

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint"]

CMD ["/usr/local/bin/bootstrap-web"]

ADD . /build

RUN /build/packages.sh && /build/setup.sh

WORKDIR /app
