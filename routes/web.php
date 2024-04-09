<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insertUser', function(){
    User::create(['name'=>'rach', 'email'=>'rach@mail.com','password'=>'123']);
});

Route::get('/createPost', function(){
    $user = User::findOrFail(1);

    $user->posts()->save(new Post(['title'=>'php learning','body'=>'content of php learning and writing']));
});

Route::get('readPost', function(){
    $user = User::findOrFail(1);

    foreach($user->posts as $post){
        echo $post->title.'<br />';
    }
});

Route::get('updatePost', function(){
    $user = User::findOrFail(1);

    $user->posts()->whereId(1)->update(['title'=>'update learning php']);
});

Route::get('deletePost', function(){
    $user = User::findOrFail(1);

    $user->posts()->whereId(3)->delete();
});
