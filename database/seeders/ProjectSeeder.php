<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $market_categories = [
            'Digital Marketing', 
            'SEO Services', 
            'Content Creation', 
            'Social Media Marketing', 
            'Email Marketing',
            'Web Development',
        ];

        $materials_created = [
            'High-quality websites', 
            'Responsive designs', 
            'SEO-friendly content', 
            'E-commerce platforms', 
            'Landing pages'
        ];

        $technologies_used = [
            'HTML5, CSS3, JavaScript', 
            'Vue.js, Node.js', 
            'Laravel, PHP', 
            'mySQL, mysqli', 
            'Google Analytics, SEO Tools'
        ];

        $collaborations = [
            'Collaborated with design team', 
            'Worked with SEO experts', 
            'Teamed up with content creators', 
            'Coordinated with social media managers', 
            'Partnered with email marketing specialists'
        ];

        DB::table('projects')->truncate();


        for ($i = 0; $i < 25; $i++) {

            $start_date = $faker->dateTimeBetween('-3 weeks', '+1 week');
            $end_date = $faker->dateTimeBetween($start_date, '+3 weeks');           

            $project = new Project();

            $project->title = $faker->catchPhrase;
            $project->slug = Str::of($project->title)->slug('-');
            $project->description = $faker->text(999);
            $project->market_category = $market_categories[array_rand($market_categories)];
            $project->link = $faker->url;
            $project->image = $faker->imageUrl(640, 480, 'business', true, 'Faker');
            $project->video = $faker->url;

            $project->start_project = $start_date;
            $project->end_project = $end_date;

            $project->material_created = $materials_created[array_rand($materials_created)];
            $project->technologies_used = $technologies_used[array_rand($technologies_used)];
            $project->collaborations = $collaborations[array_rand($collaborations)];

            $project->project_grade = $faker->numberBetween(3, 10);
            // $project->delete = false;
            
            // $project->save();
            dd($project);

        }
    }
}

