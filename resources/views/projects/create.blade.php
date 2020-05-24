@extends('layouts.app')


@section('content')
    <div class="bg-white p-8 rounded-lg shadow mb-2">
    <h1 class="text-3xl text-center"> Create a Project</h1>
    <form class="rounded px-8 pt-6 pb-8 mb-4" method="POST" action="/projects">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                Title
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="title" type="text" placeholder="Title">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline h-56"
                name="description" type="textarea" placeholder="Description"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Create
            </button>
        </div>
    </form>
    </div>
@endsection
