@extends('layouts.app')

@section('title', 'Post Detail Page')

@section('content')
  <h1>Post {{$id}} - {{$name}} - {{$password}}</h1>
@endsection