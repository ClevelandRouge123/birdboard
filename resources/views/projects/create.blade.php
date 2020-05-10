@extends('layouts.app')

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Hello Bulma!</title>--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">--}}
{{--    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>--}}
{{--</head>--}}

@section('content')
    <h1 class="text-3xl"> Create a Project</h1>
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
            <input
                class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                name="description" type="textarea" placeholder="Description">
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Create
            </button>
        </div>
    </form>
@endsection
