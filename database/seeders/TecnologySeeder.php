<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;
class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Tecnology::truncate();
        Schema::enableForeignKeyConstraints();

        $tecnologyes = ["Laravel","Php","Vuejs","Html","Css","Sass","Bootstrap"];
        foreach($tecnologyes as $tecnology){
             
            $Newtecnology = new Tecnology();
            $Newtecnology->name ="#" . $tecnology;
            $Newtecnology->description = $faker->text(150);
            $Newtecnology->save();
        }
        
    }
}
