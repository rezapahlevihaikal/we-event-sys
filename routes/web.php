<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipeEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventBudgetController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\KeynoteController;
use App\Http\Controllers\DailyTaskController;
use App\Http\Controllers\DokumentasiController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('tipeEvent')->group(function(){
	Route::get('/', [TipeEventController::class, 'index'])->name('tipeEvent');
	Route::post('store', [TipeEventController::class, 'store'])->name('tipeEvent.store');
	Route::get('edit/{id}', [TipeEventController::class, 'edit'])->name('tipeEvent.edit');
	Route::post('update/{id}', [TipeEventController::class, 'update'])->name('tipeEvent.update');
	Route::post('delete/{id}', [TipeEventController::class, 'destroy'])->name('tipeEvent.destroy');
});

Route::prefix('event')->group(function(){
	Route::get('/', [EventController::class, 'index'])->name('event');
	Route::get('create', [EventController::class, 'create'])->name('event.create');
	Route::post('store', [EventController::class, 'store'])->name('event.store');
	Route::get('edit/{id}', [EventController::class, 'edit'])->name('event.edit');
	Route::post('update/{id}', [EventController::class, 'update'])->name('event.update');
	Route::get('download/{id}', [EventController::class, 'getFileEvent'])->name('event.download');
	Route::post('delete/{id}', [EventController::class, 'destroy'])->name('event.destroy');
	Route::post('storeEb', [EventController::class, 'storeEb'])->name('event.storeEb');
	Route::post('image-gallery{id}', [EventController::class, 'upload'])->name('event.upload');
	// Route::delete('image-gallery/{id}', 'ImageGalleryController@destroy');	
});

Route::prefix('eventBudget')->group(function(){
	Route::get('/', [EventBudgetController::class, 'index'])->name('eventBudget');
	Route::get('create/{id}', [EventBudgetController::class, 'create'])->name('eventBudget.create');
	Route::post('store/{id}', [EventBudgetController::class, 'store'])->name('eventBudget.store');
	Route::get('edit/{id}', [EventBudgetController::class, 'edit'])->name('eventBudget.edit');
	Route::post('update/{id}', [EventBudgetController::class, 'update'])->name('eventBudget.update');
	Route::get('download/{id}', [EventBudgetController::class, 'getFileBudget'])->name('eventBudget.download');
});

Route::prefix('sponsor')->group(function(){
	Route::get('/', [SponsorController::class, 'index'])->name('sponsor');
	Route::get('create/{id}', [SponsorController::class, 'create'])->name('sponsor.create');
	Route::post('store/{id}', [SponsorController::class, 'store'])->name('sponsor.store');
	Route::get('edit/{id}', [SponsorController::class, 'edit'])->name('sponsor.edit');
	Route::post('update/{id}', [SponsorController::class, 'update'])->name('sponsor.update');
});

Route::prefix('keynote')->group(function(){
	Route::get('/', [KeynoteController::class, 'index'])->name('keynote');
	Route::get('create/{id}', [KeynoteController::class, 'create'])->name('keynote.create');
	Route::post('store/{id}', [KeynoteController::class, 'store'])->name('keynote.store');
	Route::get('edit/{id}', [KeynoteController::class, 'edit'])->name('keynote.edit');
	Route::post('update/{id}', [KeynoteController::class, 'update'])->name('keynote.update');
});

Route::prefix('dailyTask')->group(function(){
	Route::get('/', [DailyTaskController::class, 'index'])->name('dailyTask');
	Route::get('create/{id}', [DailyTaskController::class, 'create'])->name('dailyTask.create');
	Route::post('store/{id}', [DailyTaskController::class, 'store'])->name('dailyTask.store');
	Route::get('edit/{id}', [DailyTaskController::class, 'edit'])->name('dailyTask.edit');
	Route::post('update/{id}', [DailyTaskController::class, 'update'])->name('dailyTask.update');
});

Route::prefix('dokumentasi')->group(function(){
	Route::get('/', [DokumentasiController::class, 'index'])->name('dokumentasi');
	Route::get('create/{id}', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
	Route::post('store/{id}', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
	Route::get('edit/{id}', [DokumentasiController::class, 'edit'])->name('dokumentasi.edit');
	Route::post('update/{id}', [DokumentasiController::class, 'update'])->name('dokumentasi.update');
});
