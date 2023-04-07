@extends('layouts.app')

@section('title', 'Contact Page')

{{-- @section('content')
    <h1 style="text-align: center;">Contact Page</h1>
    @for ($i = 0; $i < count($people); $i++)
        <p style="text-align: center; font-size: 1.5rem;">{{$people[$i]}}</p>
    @endfor
@endsection --}}

@section('content')
    <h1 style="text-align: center;">Contact Page</h1>
    @if (count($people))
        <ul style="text-align: center; padding: 0;">
            @foreach ($people as $person)
                <li style="list-style: none; font-size: 1.5rem;">{{$person}}</li>
            @endforeach
        </ul>
    @endif
@endsection

@section('footer')
    {{-- <script>alert('Hello world')</script> --}}
@endsection