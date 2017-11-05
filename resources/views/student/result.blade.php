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

  @if(trim($comments) !='')
  <p>Thank you for your comments: "{{ $comments }}"</p>
  @endif

  @if($lang !='')
  <p> Great Choice of Language: "{{ $lang  }}"</p>

  <p> Did you know:
    @switch($lang)
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
