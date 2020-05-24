@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3">
        <div class="flex justify-between w-full items-center">
            <p class="mr-auto text-gray text-base"><a href="/projects">My Projects</a> / {{$project->title}}</p>
{{--            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"--}}
{{--               href="/projects/create">Add Project</a>--}}
{{--            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2"--}}
{{--               href="/projects/edit/{{$project->id}}">Edit Project</a>--}}
            <form method="delete" action="/projects/{{$project->id}}">
                <button
                    class="float-right bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"> Delete Project
                </button>
            </form>
        </div>
    </header>
    <main>
        <div class="lg:flex lg:flex-wrap -px-3">
            {{--Column one--}}
            <div class="lg:w-2/3 px-3">
                <h2 class="text-grey text-xl font-normal">Tasks</h2>
                <div class="mb-3">
                    <form action="{{$project->path() . '/tasks'}}" method="post">
                        @csrf
                        <div class="flex bg-white p-5 rounded-lg shadow mb-2 border-2 "
                             style="min-height: 50px">
                            <input placeholder="Enter New Task Here..." class="w-full" name="body">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                @foreach($project->tasks as $task)
                    <div class="mb-3">
                        <form method="POST" action="{{$task->path()}}">
                            @method('PATCH')
                            @csrf
                            <div class="bg-white p-5 rounded-lg shadow mb-2 flex" style="min-height: 50px">
                                <input name="body" value="{{$task->body}}"
                                       class="w-full {{$task->completed ? 'line-through' : '' }}">
                                <input name="completed" class="align-middle m-1" type="checkbox"
                                       onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                            </div>
                        </form>
                    </div>
                    {{--                @empty--}}
                    {{--                    <div class="mb-3">--}}
                    {{--                        <div class="bg-white p-5 rounded-lg shadow mb-2" style="min-height: 50px">--}}
                    {{--                            <div class="text-gray-500">No Tasks Found</div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                @endforeach


                <div>
                    <h2 class="text-grey text-xl font-normal">Notes</h2>

                    <div class="bg-white p-12 rounded-lg shadow mb-2 pr-4 pl-4 pt-4">
                        <form method="POST" action="{{$project->path()}}">
                            @method('PATCH')
                            @csrf
                            <textarea name="notes" style="min-height: 150px" class=" w-full mb-4"
                                      placeholder="Add notes here..">{{ $project->notes}}</textarea>
                            <button
                                class="float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit"> Save Notes
                            </button>
                        </form>
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
