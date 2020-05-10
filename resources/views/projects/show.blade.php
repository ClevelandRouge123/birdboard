@extends('layouts.app')

@section('content')


    <h1>{{$project->title}}</h1>

    <ul>
        <li>

            {{$project->description}}
        </li>


    </ul>
    <a href="/projects">Back</a>
@endsection
