<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//frontend routes
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend.index');
Route::get('topic/{category_slug}',[App\Http\Controllers\FrontendController::class, 'categoryPage']);
Route::get('topic/{category_slug}/{post_slug}',[App\Http\Controllers\FrontendController::class, 'viewPost']);

Route::get('share-social',[App\Http\Controllers\ShareButtonsController::class, 'share']);

//contact us 
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact']);

// Route::get('/', function () {
//     return redirect('/login');
// });

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);

});