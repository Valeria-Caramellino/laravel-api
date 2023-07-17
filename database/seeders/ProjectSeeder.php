<?php

namespace Database\Seeders;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();

        $types = Type::all();

        for ($i=0; $i < 10 ;$i ++ ){
            $project = new Project();
            $project->title = $faker->words(2, true);
            $project->content = $faker->text(200);
            $project->image= "placeholders/my-placeholder.jpg";
            $project->type_id = rand(1, count($types));
            $project->save();
        }
    }
}
