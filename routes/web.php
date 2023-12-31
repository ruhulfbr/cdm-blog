<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Phone;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

//   $profile = User::with('phone')->find(1);
//
//   dd($profile->phone);
//
//    $phone = Phone::find(1);
//
//    dd($phone->user->name);

//    \DB::enableQueryLog();
//    $users = User::find(1)->blogs()->select('title')->where('id', 2)->first();
//
//    dd(\DB::getQueryLog());
//
//    dd($users);

//    DB::enableQueryLog();
//    $blog = Blog::find(7)->user;

//    dd(DB::getQueryLog());

    DB::enableQueryLog();
    $user = User::find(1)->latestBlog;
    $user = User::find(1)->olderstBlogs;

    dd(DB::getQueryLog());

    dd($user);

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
