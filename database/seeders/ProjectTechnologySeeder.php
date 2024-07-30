<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectTechnology;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //? disabilito relazioni:
        Schema::disableForeignKeyConstraints();

        //? ripulisco tabella:
        ProjectTechnology::truncate();

        //? popoliamo random la tabella pivot:
        for ($i = 0; $i < 10; $i++) {
            $project_technology = new ProjectTechnology();

            $project_technology->project_id = Project::inRandomOrder()->first()->id;
            $project_technology->technology_id = Technology::inRandomOrder()->first()->id;

            $project_technology->save();

        }

        //? abilito relazione:
        Schema::enableForeignKeyConstraints();
    }
}
