<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use Illuminate\Support\Facades\Route;

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


$idRegex = '[0-9]+';
$slugRegex = '[a-z0-9\-]+';


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::prefix('/biens')->controller(\App\Http\Controllers\PropertyController::class)->name('property.')->group(function (){
    $idRegex = '[0-9]+';
    $slugRegex = '[a-z0-9\-]+';
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{property}', 'show')->name('show')->where([
        'property' => $idRegex,
        'slug' => $slugRegex,
    ]);
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::post('/biens/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex,
]);
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
