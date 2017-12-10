@extends('layouts.master')

@push('head')
<link href="/css/student/contactUs.css" type='text/css' rel='stylesheet'>
@endpush

@section('title')
Confirm deletion
@endsection

@section('content')
<h1>Confirm deletion - {{ $student->name }}</h1>

<p>Are you sure you want to delete <span class="nameCls">{{ $student->name}}</span>?</p>

<form method='POST' action='/student/{{ $student->id }}'>
  {{ method_field('delete') }}
  {{ csrf_field() }}
  <input type='submit' class="subBtn" value='Yes, Delete!'>
</form>

<p>
  <a href='{{ $previousUrl }}'>No, I changed my mind.</a>
</p>

@endsection
