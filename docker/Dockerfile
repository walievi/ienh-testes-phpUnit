FROM php:8.3-cli-alpine

COPY ./application ./application
WORKDIR /application

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-interaction

CMD ["vendor/bin/phpunit", "--testdox", "tests/AgendaTest.php"]