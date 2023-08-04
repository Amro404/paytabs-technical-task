# PayTabs Task

This is the repository for the PayTabs Task. It includes the necessary code and instructions to set up and run the project.

## Getting Started

### Prerequisites
Make sure you have Docker installed on your machine.

### Installation
1. Clone the repository:
   
shell
   git clone https://github.com/Amro404/paytabs-task
   
2. Change into the project directory:
   
shell
   cd paytabs-task
   
3. Build the Docker containers:
   
shell
   sh ./build.sh
   
### Run Migrations and Seed Data
To set up the database and seed it with testing data, run the following command:
shell
docker-compose run app php artisan migrate:fresh --seed
## Tests
To run all unit tests, use the following command:
shell
docker-compose run --rm php vendor/bin/phpunit
Feel free to add any additional instructions or information to the README file as needed.
