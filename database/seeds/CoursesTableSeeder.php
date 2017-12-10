<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $courses = [
      ['Beginner', 'basics', 10],
      ['Conversational', 'verbal communication', 15],
      ['Intermediate', 'second level', 20],
      ['Advanced', 'advanced level', 25],
      ['Business', 'for business use', 35],
      ['Writing', 'writing skills', 40]
    ];

    $count = count($courses);

    foreach ($courses as $key => $course) {
      Course::insert([
        'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'title' => $course[0],
        'desc' => $course[1],
        'price' => $course[2]

      ]);
      $count--;
    }
  }
}
