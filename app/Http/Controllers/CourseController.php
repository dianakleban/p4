<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{

  public function create()
  {

    return view('course.create')->with([
      'title'=>session('title'),
      'desc'=>session('desc'),
      'price'=>session('price')
    ]);
  }

  #Add student info into database
  public function save(Request $request)
  {
    //validation
    $this->validate($request, [
      'title' => 'required|regex:/^[\pL\s\-]+$/u',
      'desc'=> 'required',
      'price'=> 'required|integer'
    ]);

    $title = $request->input('title');
    $desc = $request->input('desc');
    $price = $request->input('price');

    //Adding Student to the database
    $course = new Course();
    $course->title = $request->input('title');
    $course->desc = $request->input('desc');
    $course->price = $request->input('price');
    $course->save();

    return redirect('/course/create')->with([
      'title'=>$title,
      'desc'=>$desc,
      'price'=>$price
    ]);
  }

}
