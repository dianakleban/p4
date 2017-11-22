@extends('layouts.master')


@section('title')
Language School
@endsection


@push('head')
<link href="/css/student/contactUs.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')

<h1>Edit Student - {{ $student->name }}</h1>

<form method='POST' action='/student/{{ $student->id }}'>
  {{ method_field('put') }}
  {{ csrf_field() }}
  <h2> We can not wait to hear from you </h2>
  <fieldset>
    <legend>Contact Us</legend>
    <p>
      <label for="name" class="category"><span class="reqMsg">*</span> Your Name:</label>
      <input name="name" type="text" size="32" id="name" value='{{ old('name', $student->name) }}' autofocus>
      @include('modules.error-field', ['fieldName' => 'name'])
    </p>

    <p>
      <label for="email" class="category"><span class="reqMsg">*</span> Your Email:</label>
      <input name="email" type="email" id="email" size="32" value='{{ old('email', $student->email) }}'>
      @include('modules.error-field', ['fieldName' => 'email'])
    </p>

    <p>
      <label for="langId" class="category"><span class="reqMsg">*</span> Language to Learn:</label>
      <select name="language" id="langId">
        <option value=''>Select</option>
        <option value='Russian' {{ (old('language', $student->language) == 'Russian') ? 'SELECTED' : '', $student->language }}>Russian</option>
        <option value='English' {{ (old('language', $student->language) == 'English') ? 'SELECTED' : '' }}>English</option>
        <option value='French' {{ (old('language', $student->language) == 'French') ? 'SELECTED' : '' }}>French</option>
        <option value='Italian' {{ (old('language', $student->language) == 'Italian') ? 'SELECTED' : '' }}>Italian</option>
      </select>
      @include('modules.error-field', ['fieldName' => 'language'])
    </p>

    <br>
    <input type="submit" value="Submit" class="subBtn"/><span class="reqInfo">* Required fields</span>

  </fieldset>
</form>

<!--if there is no errors-->
@if(count($errors) == 0)
  @if(session('alert'))
  <div class="welcome">
    {{ session('alert')}}
  </div>
  @endif
@endif

@endsection
