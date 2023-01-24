
# Visuals
![alt text](https://github.com/mohamedelazzouzi1997/formtask/blob/main/public/images/dashboard.png?raw=true)
# Installation

### 1. Clone GitHub repo for this project locally

```bash
  git clone https://github.com/mohamedelazzouzi1997/formtask
```

### 2. cd into your project

```bash
  cd formtask
```
### 3. Install Composer Dependencies

```bash
  composer install
```
### 4. Create a copy of your .env file

```bash
  cp .env.example .env
```
### 5. Generate an app encryption keye

```bash
  php artisan key:generate
```

### 6. Create an empty database for our application
  Create an empty database for your project.In our example we created a database called “ecdtest”

### 7. In the .env file, add database information to allow Laravel to connect to the database
  In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.
### 8. Migrate the database

```bash
  php artisan migrate
```
# Packages and libraries used in the project
### 1. login and registration
for the admin login and registration i used [Laravel Fortify](https://laravel.com/docs/9.x/fortify).
Laravel Fortify is a frontend agnostic authentication backend implementation for Laravel. Fortify registers the routes and controllers needed to implement all of Laravel's authentication features, including login, registration, password reset, email verification, and more. 
### 2. Charts
for the charts i user a laravel Package Called [Laravel Charts](https://charts.erik.cat/).  
Laravel Charts is a charting library for laravel  Supported  multiple javascript libraries like [ChartsJs, Highcharts, Fusioncharts...]
