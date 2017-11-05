<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

  public function index()
  {

    return view('student.index')->with([
      'name'=>session('name'),
      'email'=>session('email'),
      'comments'=>session('comments'),
      'lang'=>session('lang')
    ]);
  }

/*  public function result(Request $request)
  {

    return view('student.result')->with([
      'name'=>session('name'),
      'email'=>session('email'),
      'comments'=>session('comments'),
      'lang'=>session('lang')
    ]);
  }*/

  public function store(Request $request)
  {
    //validation
    $this->validate($request, [
      'name' => 'required|regex:/^[\pL\s\-]+$/u',
      'email'=> 'required|email',
      'lang'=> 'required'
    ]);

    $name = $request->input('name');
    $email = $request->input('email');
    $comments = $request->input('comments');
    $lang = $request->input('lang');

    return redirect('/')->with([
      'name'=>$name,
      'email'=>$email,
      'comments'=>$comments,
      'lang'=>$lang
    ]);
  }

  public function all()
   {
      return view('student.all');
   }
}
