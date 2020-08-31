<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = collect(
            ['HTML', 'CSS', 'Javascript', 'Bootstrap', 'Laravel', 'Codeigniter', 'Python', 'PHP', 'Django', 'Flask', 'React JS', 'Vue', 'Angular', 'Tailwind', 'NodeJs', 'Express', 'MongoDB', 'MySQL']
        );
        $courses->each(function($c){
            Course::create([
                'name' => $c,
                'slug' => \Str::slug($c)
            ]);
        });
    }
}
