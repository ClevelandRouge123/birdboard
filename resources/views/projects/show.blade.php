@extends('layouts.app')

@section('content')


    <h1 class="text-3xl">{{$project->title}}</h1>

    <ul>
        <li class="lg:border-separate">

            {{$project->description}}
        </li>


    </ul>
    <a href="/projects">Back</a>
@endsection
