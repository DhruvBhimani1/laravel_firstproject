<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\democontroller;
use App\Http\Controllers\eventcontroller;
use App\Models\User;
use Illuminate\Support\Facades\App;
use App\Http\Middleware\WebGard;

// Route::get('/{lang?}', function ($lang =null) {
//     App::setLocale($lang);
//     return view('index');
// });
Route::get('/foreignkey',[eventcontroller::class,'show']);

Route::get('/', function () {
    return view('index');
});
Route::get('/upload', function () {
    return view('upload');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/upload', [democontroller::class,'upload']);
Route::get('/register', [democontroller::class,'create'])->name('register');
Route::post('/register', [democontroller::class,'store'])->name('user.store');
Route::post('/login', [democontroller::class,'login']);
Route::get('/view', [democontroller::class,'view'])->name('view')->middleware(WebGard::class);
Route::delete('/delete/{id}', [democontroller::class,'delete'])->name('user.delete');
Route::put('/edit/{id}', [DemoController::class,'edit'])->name('user.edit');
Route::post('/update/{id}', [DemoController::class,'update'])->name('user.update');
Route::get('/trash', [democontroller::class,'trash'])->name('user.trash');
Route::get('/restore/{id}', [democontroller::class,'restore'])->name('user.restore');
Route::delete('/force-delete/{id}', [democontroller::class,'forceDelete'])->name('user.force-delete');
Route::get('/logout', [democontroller::class,'logout'])->name('logout');
