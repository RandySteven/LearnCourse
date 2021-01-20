<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function(){
    //post
    Route::prefix('posts')->group(function(){
        Route::get('', [PostController::class, 'index'])->name('post.index')->withoutMiddleware('auth');
        Route::get('/create-post/', [PostController::class, 'create'])->name('post.create');
        Route::post('/create-post/', [PostController::class, 'store'])->name('post.store');
        Route::get('/{post:slug}', [PostController::class, 'show'])->name('post.show')->withoutMiddleware('auth');
        Route::get('/post-edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
        Route::patch('/post-update/{post:slug}', [PostController::class, 'update'])->name('post.update');
    });

    //course
    Route::prefix('courses')->group(function(){
        Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('course.show')->withoutMiddleware('auth');
        Route::get('/courses/', [CourseController::class, 'index'])->name('courses.index')->withoutMiddleware('auth');
    });

    //comment-reply post
    Route::post('/comment', 'CommentController@store')->name('comment.store');
    Route::post('/reply', 'CommentController@replyStore')->name('reply.store');

    //forum
    Route::get('/forums', 'ForumController@index')->name('forum.index')->withoutMiddleware('auth');
    Route::get('/create-forum', 'ForumController@create')->name('forum.create');
    Route::post('/create-forum', 'ForumController@store')->name('forum.store');
    Route::get('/forum/{forum:slug}', 'ForumController@show')->name('forum.show')->withoutMiddleware('auth');
    Route::delete('/forum/{forum:id}', 'ForumController@destroy')->name('forum.delete');

    //comment-reply forum
    Route::post('/forum-comment', 'CommentController@storeAnswer')->name('answer.store');
    Route::post('/forum-reply', 'CommentController@replyAnswerStore')->name('answer.reply');

    //videos
    Route::post('/store-video', 'VideoController@store')->name('store.video');
    Route::get('/video-tutorial/{video:slug}', 'VideoController@show')->name('show.video')->withoutMiddleware('auth');
});
Route::get('/', 'LandingController@index');
Route::get('/learn-code', function () {
    return view('layouts.learn-code');
})->name('learn-code');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
