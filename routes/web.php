<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\democontroller;
use App\Http\Controllers\eventcontroller;
use App\Models\User;
use Illuminate\Support\Facades\App;

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
Route::post('/upload', [democontroller::class,'upload']);
Route::get('/register', [democontroller::class,'create'])->name('register');
Route::get('/view', [democontroller::class,'view'])->name('view');
Route::post('/register', [democontroller::class,'store'])->name('user.store');
Route::delete('/delete/{id}', [democontroller::class,'delete'])->name('user.delete');
Route::put('/edit/{id}', [democontroller::class,'edit'])->name('user.edit');
Route::post('/update/{id}', [democontroller::class,'update'])->name('user.update');
Route::get('/trash', [democontroller::class,'trash'])->name('user.trash');
Route::get('/restore/{id}', [democontroller::class,'restore'])->name('user.restore');
Route::delete('/force-delete/{id}', [democontroller::class,'forceDelete'])->name('user.force-delete');
