<p align="center"><img src="https://img.techpowerup.org/200701/hrd-assignment-frontend.png" width="700"></p>

 

## About Application 

The application is developed in PHP MVC framework Laravel that implements the Yajra Datatables with server side rendering

## Steps to run the application 

Make sure the following requirements are already fulfilled before running the application

-   PHP >= 7.2.5
-   Composer installed on your machine
-   Apache Server (XAMPP)

###### Run the following commands 

Install Dependencies
-  `composer install`

Run Migration
-   `php artisan migrate`

Run Seeder to Import Customers

-   `php artisan db:seed`

# If you get an error about an encryption key

- `php artisan key:generate`

Install any missing node dependencies

-  `npm install`

Compile fresh Scaffolding

- `npm run dev`

Finally run the server 

-   `php artisan serve`






## How Does Application is Setup 

## Database

MySQL is used in this application.

-   host      =127.0.0.1
-   database  =hrd_database
-   username  =root
-   password  =



##  Setup  Laravel Project using composer

Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

-   `composer global require laravel/installer`

Once the composer is successfully installed run the following command

-   `composer create-project --prefer-dist laravel/laravel contegris`

##  Create MySQL based Database and a sample table called "Customers" using Laravel Migrations

As outlined in the Migrations guide to fix Key length issue for MySQL modify the boot method in AppServiceProvider.php 

`public function boot(){
    Schema::defaultStringLength(191);
}`

-   Set database name  in .env file e.g DB_DATABASE=hrd_database
You may set other variables as per your requirements

Once everything for connection is setup go ahead and create a migration. To create table Customer run the following command

- `php artisan make:migration create_customers_table`

If you want to create the both model and migration for the same Table, run the following command

- `php artisan make:model Customer -m`

If you want to create everything linked up with the Customer model  then run the following command

-   `php artisan make:model Customer -a`

Once you run the above command with -a flag, it will create CustomerController, Customer Model, Migration, Factory and Customer
Seeder.

Now in order to add the columns to the table, go to the customer migration and add the required columns as  below

`Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('bio');
            $table->timestamps();
     });`
     
Now its time to migrate the table. In order to create the table, run the following command

-   `php artisan migrate`

## Create a Laraval based "Seeding" script which will populate 1,000,000 plus records in the "Customers" table

In order to seed the data for the customer table follow the following steps

##  1. Standard Method 

### I'll Seed data using two methods and on the base of their performance, I'll choose the best one.

Inside database/factories We have CustomerFactory.php class that is linked with the customer Model. Just return the array of fields
you want to use for seeding data. In our case we have the following fields

` return [
        'name'=>$faker->userName,
        'bio'=>$faker->text
 ];`
 
 Now, in order to use this factory, we have to call it from the corrosponding Seeder that is CustomerSeeder in our case.
 In the run method call it as
 -  `factory(\App\Customer::class,1000000)->create();`
 
As per the Laravel Official documentation, Every Seeder have to run from the main DatabaseSeeder.php. Now in order to run the
CustomerSeeder, call it from the run method of DatabaseSeeder class as follow

-   `$this->call(CustomerSeeder::class);`

## Its time to Seed the data

Now everything is setup, just go ahead and run the following command

-   `php artisan db:seed`

### This method took 53.37 seconds to seed just 1000 records that is too much in our case as we have to seed 1 million of records Therefor I'll never use this approach


## Second & Efficient Method 

Now the second method, that I'm gonna use follow the following  approach

-  Loop till the limit of records to seed and store the object for every row into array 
-   Chunk the array and for each chunk , insert the record using  Facade create method one by one 

* Instead of using faker here i used Str::random() method to generate fake strings that is much faster than the faker library *

### Interestingly the time take by this approach to insert 1000 records was just 0.3 seconds including the following other stats

-   > 0.3  seconds 	1000 records
-   > 2.42 seconds    1000 records
-   > 11.62 seconds   10000 records
-   > 130.53 seconds  1000000 records


Therefor, this method is much efficient and time optimized as compared to the previous method


## Setup "Blade Views" using "Bootstrap 4.x"

We simply need to install the laravel/ui package using Composer and installing the Bootstrap 4 package from npm. Run the following commands to install Bootstrap 4.

-   `composer require laravel/ui`

Once Package is successfully installed, run the next command to install bootstrap

-   `php artisan ui bootstrap`

Now in order to install the bootstrap related dependancies run the following command

-  `npm install`

In order to compile fresh scaffolding, Run the following command

- `npm run dev`

## Create a "Blade View" with "Yajra Datatables"

First, we will install the yajra/laravel-datatables-oracle package by writing the following command in cmd.

-   `composer require yajra/laravel-datatables-oracle`

Open the file config/app.php and then add following service provider

-      `Yajra\DataTables\DataTablesServiceProvider::class`

After completing the step above, use the following command to publish configuration & assets:

-   `php artisan vendor:publish --tag=datatables`



