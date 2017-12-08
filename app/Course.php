<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function students()
    {
      #Each course belong to many students
      return $this->belongsToMany('App\Student')->withTimestamps();
    }


  public static function getForCheckboxes()
  {
      $courses = Course::orderBy('price')->get();

      $coursesForCheckboxes = [];

      foreach ($courses as $course) {
          $coursesForCheckboxes[$course['id']] = $course->title;
      }

      return $coursesForCheckboxes;
  }
}
