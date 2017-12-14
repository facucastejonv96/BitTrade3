<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/createpostform" , "PostController@createPostForm")->name("create-post-form");
Route::post("/createpostform" , "PostController@post")->name("post");
Route::get("/myposts" , "PostController@myPosts")->name("myposts");
Route::post("/editpostform" , "PostController@editPostForm")->name("editpostform");
Route::put("/editpostform" , "PostController@editPost")->name("editpost");
Route::get("/openchat" , "ChatController@openChat")->name("openchat");
Route::get("/sendmessage" , "ChatController@sendMessage")->name("sendmessage");
Route::get("/retrieveChatMessages" , "ChatController@retrieveChatMessages");
Route::get("/brignOldMessages" , "ChatController@brignOldMessages");
route::get("/listchats" , "ChatController@listChats")->name("listchats");
route::post("openExistentChat" , "ChatController@openExistentChat")->name("openexistentchat");
