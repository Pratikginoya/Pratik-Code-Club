<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Livewire\Dashboard;
use App\Livewire\TechnologyCreate;
use App\Livewire\StoreYourCode;
use App\Livewire\ManageYourCode;
use App\Livewire\SearchYourCode;
use App\Livewire\ViewDetailCode;

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

// Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[LoginController::class,'login'])->name('login'); // login page
    Route::post('/user_check',[LoginController::class,'userCheck'])->name('user_check'); // login user
    Route::get('/register',[AuthController::class,'register'])->name('register'); // register page
    Route::post('/register_post',[AuthController::class,'registerUser'])->name('register_post'); // user register
// });

// Route::group(['middleware' => 'auth'], function(){
Route::middleware('auth.custom')->group(function() {
    Route::redirect('/', '/dashboard');  // make dashbord as index page
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/technology', function () {
        return view('technology');
    });

    Route::get('/code/store', StoreYourCode::class);
    Route::get('/code/manage', ManageYourCode::class);
    Route::get('/code/store/{id}', StoreYourCode::class);
    Route::get('/code/search', SearchYourCode::class);
    Route::get('/code/detail/{id}', ViewDetailCode::class);

    Route::get('/log-out', [LoginController::class,'Logout']);
});
