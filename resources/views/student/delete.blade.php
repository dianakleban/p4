  @extends('layouts.master')

  @push('head')
      <link href="/css/student/contactUs.css" type='text/css' rel='stylesheet'>
  @endpush

  @section('title')
      Confirm deletion: {{ $student->name }}
  @endsection

  @section('content')
      <h1>Confirm deletion</h1>

      <p>Are you sure you want to delete <strong>{{ $student->name}}</strong>?</p>

      <form method='POST' action='/student/{{ $student->id }}'>
          {{ method_field('delete') }}
          {{ csrf_field() }}
          <input type='submit' value='Yes, delete it!'>
      </form>

      <p class='cancel'>
          <a href='{{ $previousUrl }}'>No, I changed my mind.</a>
      </p>

  @endsection
