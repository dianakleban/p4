@extends('layouts.master')


@section('title')
Language School
@endsection


@push('head')
<link href="/css/student/contactUs.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')

<!--if there is no errors, show result -->
  @if(count($errors) == 0)
    <div class="welcome">
        <p>Welcome to our Language School
          @if(isset($name))
          ,<span class="yourNm"> {{ $name }} </span>!
          @endif
        </p>
    </div>
  @endif
@endsection
