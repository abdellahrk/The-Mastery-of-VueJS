<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Story;

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

/*
Route::get('stories', function (){
    return Story::all();
});
*/
//Route::get('/{any}', [StoryController::class, 'index'])->where('any', '.*');



Route::resource('stories', StoryController::class);

Route::get('api/stories', function(){
    return Story::all();
});

Route::patch('api/stories/{story}', [StoryController::class, 'upvote']);

Route::delete('api/stories/{story}', [StoryController::class, 'destroy']);

