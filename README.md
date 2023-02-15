Laravel App Installation and Deployment
This is a step-by-step guide to help you install and deploy a Laravel app. Please follow the instructions carefully.

Prerequisites
Before proceeding with the installation and deployment of the Laravel app, you should have the following installed on your system:

PHP >= 7.4
Composer
MySQL or MariaDB
Git
Installation
Clone the repository to your local machine using the following command:


git clone https://github.com/ikyalo/preston
Change into the directory of the cloned project using the following command:


cd your-project-name
Run the following command to install the dependencies:


composer install
Create a copy of the .env.example file and rename it to .env:


cp .env.example .env
Generate an application key using the following command:



php artisan key:generate
Update the .env file with the database connection details:



DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
Run the following command to create the necessary database tables:


php artisan migrate
Start the development server by running the following command:


php artisan serve
Visit http://localhost:8000 in your web browser to see the Laravel app running.

Deployment
Here are the steps to deploy your Laravel app to a production server:

Clone the repository to the server using the following command:



git clone https://github.com/your-repo-url
Change into the directory of the cloned project using the following command:



cd your-project-name
Run the following command to install the dependencies:



composer install --no-dev
Create a copy of the .env.example file and rename it to .env:


cp .env.example .env
Update the .env file with the production database connection details:



DB_CONNECTION=mysql
DB_HOST=your_database_host
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
Generate an application key using the following command:



php artisan key:generate
Run the following command to create the necessary database tables:


php artisan migrate --force
Configure your web server to point to the public directory of your Laravel app.

Visit your production site in your web browser to see the Laravel app running.

That's it! You should now have a fully functioning Laravel app that's ready for deployment to a production server.
