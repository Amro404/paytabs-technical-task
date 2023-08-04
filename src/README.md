# 

## Getting Started
#### Note: please make sure you installed Docker in your machine
1. ```git clone https://github.com/Amro404/paytabs-task```
2. ``cd paytabs-task``
3. ```sh ./build.sh```


### Run migrations and seed data
You can use the following command to refresh the database and seed testing data

```docker-compose run app php artisan migrate:fresh --seed```

## Tests
To Run all unit tests by running:

```docker-compose run --rm php vendor/bin/phpunit```

