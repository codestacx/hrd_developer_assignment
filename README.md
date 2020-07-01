<p align="center"><img src="https://img.techpowerup.org/200701/hrd-assignment-frontend.png" width="700"></p>

 

## About Application 


The application is developed in PHP MVC framework Laravel that implements the Yajra Datatables with server side rendering

## Database

MySQL is used in this application.

-   host      =127.0.0.1
-   database  =hrd_database
-   username  =root
-   password  =

## How Does Application is Setup 

##  Setup  Laravel Project using composer

Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

-   composer global require laravel/installer

Once the composer is successfully installed run the following command

-   composer create-project --prefer-dist laravel/laravel contegris

##  Create MySQL based Database and a sample table called "Customers" using Laravel Migrations

As outlined in the Migrations guide to fix Key length issue for MySQL modify the boot method in AppServiceProvider.php 

public function boot(){
    Schema::defaultStringLength(191);
}

-   Set database name  in .env file e.g DB_DATABASE=hrd_database
You may set other variables as per your requirements

Once everything for connection is setup go ahead and create a migration. To create table Customer run the following command

- php artisan make:migration create_customers_table

If you want to create the both model and migration for the same Table, run the following command

- php artisan make:model Customer -m

If you want to create everything linked up with the Customer model  then run the following command

-   php artisan make:model Customer -a

Once you run the above command with -a flag, it will create CustomerController, Customer Model, Migration, Factory and Customer
Seeder.

Now in order to add the columns to the table, go to the customer migration and add the required columns as  below

Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('bio');
            $table->timestamps();
     });
     
Now its time to migrate the table. In order to create the table, run the following command

-   php artisan migrate

## Create a Laraval based "Seeding" script which will populate 1,000,000 plus records in the "Customers" table

In order to seed the data for the customer table follow the following steps

##  1. Standard Method


Inside database/factories We have CustomerFactory.php class that is linked with the customer Model. Just return the array of fields
you want to use for seeding data. In our case we have the following fields

return [
        'name'=>$faker->userName,
        'bio'=>$faker->text
 ];
 
 Now, in order to use this factory, we have to call it from the corrosponding Seeder that is CustomerSeeder in our case.
 In the run method call it as
 -  factory(\App\Customer::class,1000)->create();
 
As per the Laravel Official documentation, Every Seeder have to run from the main DatabaseSeeder.php. Now in order to run the
CustomerSeeder, call it from the run method of DatabaseSeeder class as follow

-   $this->call(CustomerSeeder::class);



- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)
- [云软科技](http://www.yunruan.ltd/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
