@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3">
        <div class="flex justify-between w-full items-center">
            <p class="mr-auto text-gray text-base"><a href="/projects">My Projects</a> / {{$project->title}}</p>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
               href="/projects/create">Add Project</a>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2"
               href="/projects/edit/{{$project->id}}">Edit Project</a>
            <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2"
               href="/projects/delete/{{$project->id}}">Delete Project</a>
        </div>
    </header>
    <main>
        <div class="lg:flex lg:flex-wrap -px-3">
            {{--Column one--}}
            <div class="lg:w-2/3 px-3">
                <h2 class="text-grey text-xl font-normal">Tasks</h2>
                <div class="mb-3">
                    <div class="bg-white p-5 rounded-lg shadow mb-2" style="min-height: 50px">
                        <div class="text-gray-500">Task</div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="bg-white p-5 rounded-lg shadow mb-2" style="min-height: 50px">
                        <div class="text-gray-500">Task</div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="bg-white p-5 rounded-lg shadow mb-2" style="min-height: 50px">
                        <div class="text-gray-500">Task</div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="bg-white p-5 rounded-lg shadow mb-2" style="min-height: 50px">
                        <div class="text-gray-500">Task</div>
                    </div>
                </div>
                <div>
                    <h2 class="text-grey text-xl font-normal">Notes</h2>

                    <div class="bg-white p-5 rounded-lg shadow mb-2" style="height: 200px">
                        {{--                            <h3 class="font-normal text-xl mb-4 py-2 -ml-5  border-l-4 pl-4"--}}
                        {{--                                style="border-left: 4px solid #4299e1">Notes--}}
                        {{--                            </h3>--}}
                        <textarea style="min-height: 150px" class="text-gray-500 w-full h-full">{{ Str::limit($project->description, 100)}}</textarea>
                    </div>
                </div>
                <div></div>
            </div>
            {{--Column two--}}
            <div class="lg:w-1/3 px-3">
                <div>
                    <div class="bg-white p-5 rounded-lg shadow mb-2" style="height: 200px">
                        <h3 class="font-normal text-xl mb-4 py-2 -ml-5  border-l-4 pl-4"
                            style="border-left: 4px solid #4299e1">{{$project->title}}
                        </h3>
                        <div class="text-gray-500">{{ Str::limit($project->description, 100)}}</div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <a class="float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
       href="/projects">Back</a>
@endsection
