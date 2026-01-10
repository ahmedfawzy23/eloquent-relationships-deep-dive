@foreach ($users as $user)
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->profile->bio }} ({{ $user->profile->handle }})</p>
    <ul>
        @foreach ($user->tasks as $task)
            <li>{{ $task->title }}</li>
        @endforeach
    </ul>
@endforeach
