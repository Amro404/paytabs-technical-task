set -e

cp .env.example .env

docker-compose up -d --build

docker-compose run --rm composer install

docker-compose run --rm artisan migrate:fresh --seed

docker-compose run --rm php vendor/bin/phpunit

