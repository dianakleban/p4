<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function courses()
    {
      #Each student belong to many courses
      return $this->belongsToMany('App\Course')->withTimestamps();
    }
}
