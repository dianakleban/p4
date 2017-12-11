@extends('layouts.master')


@section('title')
Language School
@endsection


@push('head')
<link href="/css/student/contactUs.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')
<form method='POST' action='/course'>
  {{ csrf_field() }}
  <h2> We can not wait to hear from you </h2>
  <fieldset>
    <legend>Add Course</legend>
    <p>
      <label for="title" class="category"><span class="reqMsg">*</span> Title:</label>
      <input name="title" type="text" size="32" id="title" value='{{ old('title') }}' autofocus>
      @include('modules.error-field', ['fieldName' => 'title'])
    </p>

    <p>
      <label for="desc" class="category"><span class="reqMsg">*</span> Desc:</label>
      <input name="desc" type="text" id="desc" size="32" value='{{ old('desc') }}'>
      @include('modules.error-field', ['fieldName' => 'desc'])
    </p>

    <p>
      <label for="price" class="category"><span class="reqMsg">*</span> Price:</label>
      <input name="price" type="text" id="price" size="4" value='{{ old('price') }}'>
      @include('modules.error-field', ['fieldName' => 'price'])
    </p>

    <br>
    <input type="submit" value="Submit" class="subBtn"/><span class="reqInfo">* Required fields</span>

  </fieldset>
</form>

  <!--if there is no errors -->
  @if(count($errors) == 0)
    @if($title !='')
    <div class="welcome">
      <p> Your course was added: "{{ $title  }}"</p>
    </div>
    @endif
  @endif
@endsection
