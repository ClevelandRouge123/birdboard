@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-3">
        <h1 class="mr-auto text-2xl">Projects:</h1>
        <a href="/projects/create">New Project</a>
    </div>
    <div class="flex flex-wrap">
        @forelse($projects as $project)
            <div class="bg-white mr-4 p-5 rounded shadow w-1/3 mb-2" style="height: 200px">
                <h3 class="font-normal text-xl mb-4 py-2">{{$project->title}}</h3>
                <div class="text-gray-500">{{ Str::limit($project->description, 100)}}</div>
            </div>
        @empty
            <div> No Projects Yet.</div>
        @endforelse
    </div>

@endsection
