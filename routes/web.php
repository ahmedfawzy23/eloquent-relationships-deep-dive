<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Profile;

Route::get('/', function () {
    $user = User::find(1);
    $tasks = $user->tasks()->where('status', 'in_progress')->get();
    return view('welcome', compact('user', 'tasks'));
});
Route::get('/list', function () {
    $users = User::with(['profile', 'tasks' => function($query){
        $query->where('status', 'in_progress');
    }])->get();
    return view('list', compact('users'));
});

Route::get('/create', function () {
    $user = User::find(1);
    // $user->profile()->create([
    //     'bio' => "I'm the first user",
    //     'handle' => "first"
    // ]);

    $profile = new Profile([
        'bio' => "I'm the first user",
        'handle' => "first"
    ]);

    $user->profile()->save($profile);
});

Route::get('/profile', function () {
    $profile = Profile::find(1);
    return $profile->load('user');
});
