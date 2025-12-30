<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Profile;

Route::get('/', function () {
    $users = User::with('profile')->get();
    return view('welcome', compact('users'));
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
