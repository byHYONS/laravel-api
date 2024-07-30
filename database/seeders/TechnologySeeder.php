<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //? prima della modifica:
        Schema::disableForeignKeyConstraints();

        Technology::truncate();

        $technologies_used = [
            'HTML5, CSS3, JavaScript', 
            'Vue.JS in Node.js', 
            'Laravel PHP', 
            'Vue.JS & Laravel',
            'Laravel & API',
            'Vue.JS & API',
            'Vue.JS & Laravel & mySQL',
            'mySQL, mysqli, SQL', 
            'Google Analytics, SEO Tools',
        ];

        foreach($technologies_used as $technology_used) {

            $technology = new Technology();

            $technology->name = $technology_used;
            $technology->slug = Str::of($technology_used)->slug();

            $technology->save();

        }

        //? dopo la madifica:
        Schema::enableForeignKeyConstraints();
    }
}
