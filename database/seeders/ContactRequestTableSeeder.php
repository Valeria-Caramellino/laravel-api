<?php

namespace Database\Seeders;

use App\Models\ContactRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class ContactRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        ContactRequest::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i= 0; $i < 3; $i ++){
            $newContact= new ContactRequest();
            $newContact->name= $faker->userName();
            $newContact->email= $faker->email();
            $newContact->message= $faker->text(50);
            $newContact->save();
        }

    }
}
