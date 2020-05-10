@extends('layouts.app')

@section('content')
    <div style="display: flex; align-items: center">
    <h1 class="card-header" style="margin-right: auto">Projects:</h1>
    <a href="/projects/create">New Project</a>
    </div>
        <ul>
        @forelse($projects as $project)
            <li class="list-decimal">
                <a href="{{$project->path()}}">{{$project->title}}</a>
            </li>

        @empty
            <li>No Projects Found</li>

        @endforelse

    </ul>
@endsection
