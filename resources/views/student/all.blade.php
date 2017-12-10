@extends('layouts.master')


@section('title')
Language School
@endsection


@push('head')
<link href="/css/student/contactUs.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')

<table id="studentsTbl">
  <caption class="welcome">List of All Students</caption>
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Language</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
    <tr>
      <th scope="row">{{ $student['name'] }}</th>
      <td>{{ $student['email'] }}</td>
      <td>{{ $student['language'] }}</td>
      <td><a href='/student/{{ $student['id'] }}'>View</a></td>
      <td><a href='/student/{{ $student['id'] }}/edit'>Edit</a></td>
      <td><a href='/student/{{ $student['id'] }}/delete'>Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@if(session('alert'))
<div class="welcome">
  {{ session('alert') }}
</div>
@endif


@endsection
