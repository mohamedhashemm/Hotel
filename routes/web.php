<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StarterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
->name('dashboard');

Route::get('/starter', [StarterController::class, 'index']
)
->middleware(['auth', 'verified'])
->name('starter');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 


Route::group([
    'middleware'=>['auth'],
],function(){



    
    Route::put('categories/{category}/restore',[CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/{category}/force-delete',[CategoryController::class, 'forceDelete'])->name('categories.force-delete');
    Route::get('categories/trash',[CategoryController::class, 'trash'])->name('categories.trash');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', productController::class);

});









require __DIR__.'/auth.php';
