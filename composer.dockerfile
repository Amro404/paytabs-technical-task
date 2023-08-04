FROM composer:2



ENV COMPOSERUSER=paytabs
ENV COMPOSERGROUP=paytabs

RUN adduser -g ${COMPOSERGROUP} -s /bin/sh -D ${COMPOSERUSER}