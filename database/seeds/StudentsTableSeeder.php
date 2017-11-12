<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $students = [
      ['Diana Kleban', 'deanaem1@yahoo.com', 'Russian'],
      ['Emily Kleban', 'emilykleban@uconn.edu', 'Italian'],
      ['Veronica Bach', 'veronica@hartford.com', 'English'],
      ['Arkadiy Klebanov', 'arkadiy@hotmail.com', 'Russian']
    ];

    $count = count($students);

    foreach ($students as $key => $student) {
      Student::insert([
        'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'name' => $student[0],
        'email' => $student[1],
        'language' => $student[2]

      ]);
      $count--;
    }
  }
}
