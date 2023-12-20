<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\PhoneController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test' , function(){
    return 'hola';
});

Route::post('/tags' , [TagController::class , 'store' ] )->name('tags.store');

Route::patch('/tags/{id}' , [TagController::class , 'update' ] )->name('tags.update');

Route::get('/tags' , [TagController::class , 'index' ] )->name('tags.index');

Route::get('/tags/{id}' , [TagController::class , 'show' ] )->name('tags.show');

Route::delete('/tags/{id}' , [TagController::class , 'destroy' ] )->name('tags.destroy');

// -----------------------------------------------------
Route::post('/phones' , [PhoneController::class , 'store' ] )->name('phones.store');

Route::patch('/phones/{id}' , [PhoneController::class , 'update' ] )->name('phones.update');

Route::get('/phones' , [PhoneController::class , 'index' ] )->name('phones.index');

Route::get('/phones/{id}' , [PhoneController::class , 'show' ] )->name('phones.show');

Route::delete('/phones/{id}' , [PhoneController::class , 'destroy' ] )->name('phones.destroy');
// -------------------------------------------------------------

Route::post('/emails' , [EmailController::class , 'store' ] )->name('emails.store');

Route::patch('/emails/{id}' , [EmailController::class , 'update' ] )->name('emails.update');

Route::get('/emails' , [EmailController::class , 'index' ] )->name('emails.index');

Route::get('/emails/{id}' , [EmailController::class , 'show' ] )->name('emails.show');

Route::delete('/emails/{id}' , [EmailController::class , 'destroy' ] )->name('emails.destroy');
// -------------------------------------------------------------


Route::post('/contacts' , [ContactController::class , 'store' ] )->name('contacts.store');

Route::patch('/contacts/{id}' , [ContactController::class , 'update' ] )->name('contacts.update');

Route::get('/contacts' , [ContactController::class , 'index' ] )->name('contacts.index');

Route::get('/contacts/{id}' , [ContactController::class , 'show' ] )->name('contacts.show');

Route::delete('/contacts/{id}' , [ContactController::class , 'destroy' ] )->name('contacts.destroy');

Route::post('/users' , [UserController::class , 'show' ] )->name('users.show');
