<!DOCTYPE html>
<html>
<body>

<h1>Birdboard</h1>

<ul>
    @forelse($projects as $project)
        <li>
            {{$project->title}}
        </li>

    @empty
        <li>No Projects Found</li>

    @endforelse

</ul>

</body>
</html>
