<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= Faker::create();
        for ($i=1; $i < 20; $i++) { 
            $customer= new Customer;
            $customer->customer_name= $faker->name;
            $customer->customer_email= $faker->email;
            $customer->dob= $faker->date;
            $customer->gender= 'M';
            $customer->address= $faker->address;
            $customer->password= md5($faker->password);
            $customer->save();
        }
        
    }
}
