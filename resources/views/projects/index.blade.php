@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3">
        <div class="flex justify-between w-full items-center">
            <h1 class="mr-auto text-xl">My Projects:</h1>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
               href="/projects/create">New Project</a>
        </div>
    </header>
    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse($projects as $project)
            <a class="lg:w-1/3 px-2 pb-2" href="{{$project->path()}}">
                <div>
                    <div class="bg-white p-5 rounded-lg shadow mb-2" style="height: 200px">
                        <h3 class="font-normal text-xl mb-4 py-2 -ml-5  border-l-4 pl-4"
                            style="border-left: 4px solid #4299e1">{{$project->title}}
                        </h3>
                        <div class="text-gray-500">{{ Str::limit($project->description, 100)}}</div>
                    </div>
                </div>
            </a>
        @empty
            <div> No Projects Yet.</div>
        @endforelse
    </main>
x
@endsection
