<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\Course;

class CourseStudentTableSeeder extends Seeder
{

    public function run()
    {

      $students =[
          'Diana Kleban' => ['Business', 'Beginner'],
          'Emily Kleban' => ['Business', 'Advanced']
      ];

      foreach ($students as $name => $courses) {

          $student = Student::where('name', 'like', $name)->first();

          foreach ($courses as $courseName) {
              $course = Course::where('title', 'LIKE', $courseName)->first();

              # Connect this course to this student
              $student->courses()->save($course);
          }
      }
    }
}
