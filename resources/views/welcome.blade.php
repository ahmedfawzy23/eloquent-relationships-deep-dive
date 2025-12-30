@foreach ($users as $user)
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->profile->bio }}</p>
    <p>{{ $user->profile->handle }}</p>
@endforeach
