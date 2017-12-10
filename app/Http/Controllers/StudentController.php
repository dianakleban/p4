<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;

class StudentController extends Controller
{

  public function index()
  {

    $coursesForCheckboxes = Course::getForCheckboxes();

    return view('student.index')->with([
      'name'=>session('name'),
      'email'=>session('email'),
      'language'=>session('language'),
      'coursesForCheckboxes' => $coursesForCheckboxes
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

    $student->courses()->sync($request->input('courses'));

    return redirect('/')->with([
      'name'=>$name,
      'email'=>$email,
      'language'=>$language
    ]);
  }

  #Edit student
  public function edit($id)
  {
    $student = Student::with('courses')->find($id);

    if (!$student)
    {
      return redirect('/all')->with('alert', 'Student not found');
    }

    $coursesForCheckboxes = Course::getForCheckboxes();

    $coursesForThisStudent = [];
    foreach ($student->courses as $course)
    {
        $coursesForThisStudent[] = $course->title;
    }

    return view('student.edit')->with([
      'student' => $student,
      'coursesForCheckboxes' => $coursesForCheckboxes,
      'coursesForThisStudent' => $coursesForThisStudent
    ]);
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

    $student->courses()->sync($request->input('courses'));

    $student->name = $request->input('name');
    $student->email = $request->input('email');
    $student->language = $request->input('language');
    $student->save();

    return redirect('/student/'.$id.'/edit')->with('alert', 'Your changes were saved.');
  }

  #View student
  public function show($id)
  {
    $student = Student::with('courses')->find($id);

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

    $student->courses()->detach();
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
