# api-platform-project

# Install dependencies
composer install

# Database

- Create a new database and update the .env file with your database credentials:
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

- Create the database and its schema:
php bin/console doctrine:database:create

- Run the database migrations:
php bin/console doctrine:migrations:migrate

- Load the fixtures (optional, only needed for testing):
php bin/console doctrine:fixtures:load

# Fetch data from external api to fill database
- php bin/console app:create:countries
- php bin/console app:create:publicHolidays

# Lauch server
symfony serve

The API will be available at http://localhost:8000/.

# Documentation
API documentation is available at /api/docs. It is automatically generated based on the API Platform annotations in the code.
