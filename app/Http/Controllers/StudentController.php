<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{

  public function index()
  {

    return view('student.index')->with([
      'name'=>session('name'),
      'email'=>session('email'),
      'language'=>session('language')
    ]);
  }
  
  #Add student info into database
  public function store(Request $request)
  {
    //validation
    $this->validate($request, [
      'name' => 'required|regex:/^[\pL\s\-]+$/u',
      'email'=> 'required|email',
      'language'=> 'required'
    ]);

    $name = $request->input('name');
    $email = $request->input('email');
    $language = $request->input('language');

    //Adding Student to the database
    $student = new Student();
    $student->name = $request->input('name');
    $student->email = $request->input('email');
    $student->language = $request->input('language');
    $student->save();

    return redirect('/')->with([
      'name'=>$name,
      'email'=>$email,
      'language'=>$language
    ]);
  }

  #Edit student
  public function edit($id)
  {
    $student = Student::find($id);

    if (!$student)
    {
      return redirect('/all')->with('alert', 'Student not found');
    }

    return view('student.edit')->with(['student' => $student]);
  }

  #Update edited student
  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required|regex:/^[\pL\s\-]+$/u',
      'email'=> 'required|email',
      'language'=> 'required'
    ]);

    $student = Student::find($id);

    $student->name = $request->input('name');
    $student->email = $request->input('email');
    $student->language = $request->input('language');
    $student->save();

    return redirect('/student/'.$id.'/edit')->with('alert', 'Your changes were saved.');
  }

  #View student
  public function show($id)
  {
    $student = Student::find($id);

    if (!$student)
    {
      return redirect('/all')->with('alert', 'Student not found');
    }

    return view('student.show')->with([
      'student' => $student
    ]);
  }

  #Delete student
  public function delete($id)
  {

    $student = Student::find($id);

    if (!$student)
    {
      return redirect('/all')->with('alert', 'Student not found');
    }

    $removedStudent = $student->name;
    $student->delete();

    return redirect('/all')->with('alert', 'Student deleted: '.$removedStudent);

  }

  #Show All Students
  public function all()
  {
    $students = Student::orderBy('language')->orderBy('name')->get();

    return view('student.all')->with([
      'students' => $students
    ]);
  }
}
