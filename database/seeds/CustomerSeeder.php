<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function returnMeFilledArray(){

    }
    public function run()
    {


        //=============================== 1st method --------------------------------

        // =>                     factory(\App\Customer::class,1000)->create();

        /*
         *
         * This is standard method recommended but this take more time rather than the other method
         * for sake of testing I insert 1000 records using this method and it took 53.37 seconds
         *
         *
         */

        //===============================2nd Method -----------------------------------

        /*
         * I insert the same 1000 records but it just took 0.3 seconds
         *
         */


        $faker = Faker::create();


        /*
         *
         * Using the faker library to generate the fake values takes more time rather than using  Random
         * that's why I prefer to use the random to generate the fake values
         */

        $limit = 1000000;
        for ($i=0; $i < $limit; $i++) {
            $bulk[] = [
                'name' => Str::random(10),
                'bio' => Str::random(30),

                'created_at' => \Carbon\Carbon::now(),
                'updated_at' =>  \Carbon\Carbon::now()
            ];
        }


        $sliced = array_chunk($bulk, 5000);

        foreach ($sliced as $rec) {
            \App\Customer::insert($rec);
        }

    }
}
