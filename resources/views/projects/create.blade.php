@extends('layouts.app')

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Hello Bulma!</title>--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">--}}
{{--    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>--}}
{{--</head>--}}

@section('content')
    <form class="container" method="POST" action="/projects">
        @csrf
        <h1>Create A Project</h1>

        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title">
            </div>
        </div>

        <div class="field">

            <label class="label" for="description">Description</label>

            <div class="control">
                <textarea name="description" class="textarea"></textarea>
            </div>

        </div>

        <div class="field">

            <div class="control">
                <button type="submit" class="button is-link">Create Project</button>
<a href="/projects">Cancel</a>
            </div>

        </div>
    </form>
@endsection
