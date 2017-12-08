@extends('layouts.master')


@section('title')
Language School
@endsection


@push('head')
<link href="/css/student/contactUs.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')
<form method='POST' action='/student'>
  {{ csrf_field() }}
  <h2> We can not wait to hear from you </h2>
  <fieldset>
    <legend>Contact Us</legend>
    <p>
      <label for="name" class="category"><span class="reqMsg">*</span> Your Name:</label>
      <input name="name" type="text" size="32" id="name" value='{{ old('name') }}' autofocus>
      @include('modules.error-field', ['fieldName' => 'name'])
    </p>

    <p>
      <label for="email" class="category"><span class="reqMsg">*</span> Your Email:</label>
      <input name="email" type="email" id="email" size="32" value='{{ old('email') }}'>
      @include('modules.error-field', ['fieldName' => 'email'])
    </p>

    <p>
      <label for="langId" class="category"><span class="reqMsg">*</span> Language to Learn:</label>
      <select name="language" id="langId">
        <option value=''>Select</option>
        <option value='Russian' {{ (old('language') == 'Russian') ? 'SELECTED' : '' }}>Russian</option>
        <option value='English' {{ (old('language') == 'English') ? 'SELECTED' : '' }}>English</option>
        <option value='French' {{ (old('language') == 'French') ? 'SELECTED' : '' }}>French</option>
        <option value='Italian' {{ (old('language') == 'Italian') ? 'SELECTED' : '' }}>Italian</option>
      </select>
      @include('modules.error-field', ['fieldName' => 'language'])
    </p>

    <p>
      <label for="courses" class="category">Courses:</label><br>
      @include('student.coursesCheckboxes')
    </p>

    <br>
    <input type="submit" value="Submit" class="subBtn"/><span class="reqInfo">* Required fields</span>

  </fieldset>
</form>

<!--if there is no errors -->
@if(count($errors) == 0)
<div class="welcome">
  <p>Welcome to our Language School
    @if(isset($name))
    ,<span class="yourNm"> {{ $name }} </span>!
    @endif
  </p>

  @if($language !='')
  <p> Great Choice of Language: "{{ $language  }}"</p>

  <p> Did you know:
    @switch($language)
    @case('Russian')
    "Russian is a Slavic language of the Indo-European family! Russian alphabet consists of 33 letters."</p>
    @break

    @case('English')
    "Almost 29% of English words come from French, another 29% come from Latin, another 26% come from Germanic languages, with other languages contributing the other 15%."</p>
    @break

    @case('French')
    "About 220 million people speak French as a native or a second language."</p>
    @break

    @case('Italian')
    "Italian is a Romance language spoken by about 60 million people in Italy, Switzerland, San Marino, Vatican City, Malta and Eritrea."</p>
    @break

    @default
    "Every language is good!"</p>
    @endswitch

    <p>Thank you for contacting us. We will get back to you soon!</p>
    @endif

  </div>
  @endif
  @endsection
