@extends('layouts.master')


@section('title')
View {{ $student->name }}
@endsection


@push('head')
<link href="/css/student/contactUs.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')

<table id="studentsTbl">
  <caption class="welcome">View Student - {{ $student->name }}</caption>
  <thead>
    <tr>
      <th scope="col">Student</th>
      <th scope="col">Info</th>
    </tr>
  </thead>
  <tbody>
    <tr><th scope="row">Name:</th><td>{{ $student['name'] }}</td></tr>
    <tr><th scope="row">Email:</th><td>{{ $student['email'] }}</td></tr>
    <tr><th scope="row">Language:</th><td>{{ $student['language'] }}</td></tr>
    <tr><th scope="row"><a href='/all'>All Students</a></th><td><a href='/student/{{ $student['id'] }}/edit'>Edit</a></td></tr>
    <tr><th scope="row"></th><td><a href='/student/{{ $student['id'] }}/delete'>Delete</a></td></tr>
  </tbody>
</table>

@if(session('alert'))
  <div class="welcome">
  {{ session('alert')}}
 </div>
@endif

@endsection
