<?php

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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\HomeComponent;


Route::get('/test', function () {
    return view('layouts/main');
});
// Route::get('/', [
//     use App\Http\Controllers\HomeComponent
// ]);

Route::get('/',[HomeComponent::class,'index'] )->name('home');



Route::prefix('admin')->group(function () {
    Route::prefix('products')->group(function () {
       
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('adelete.product');
        Route::get('/create', [ProductController::class, 'add']);
    
        Route::post('/', [ProductController::class, 'store'])->name('product.add');
        Route::get('/{id}/update', [ProductController::class, 'update'])->name('product.update');
        Route::post('/{id}', [ProductController::class, 'edit'])->name('product.edit');
     
     
      
        Route::delete('/{id}', [ProductController::class, 'delete']);
        Route::get('/{id}', [ProductController::class, 'show']);
       
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete.category.product');
        Route::get('/create', [CategoryController::class, 'add']);
    
        Route::post('/', [CategoryController::class, 'store'])->name('product.category.add');
        Route::get('/{id}/update', [CategoryController::class, 'update'])->name('product.category.update');
        Route::post('/{id}', [CategoryController::class, 'edit'])->name('product.category.edit');
    });
    Route::prefix('stocks')->group(function () {
        Route::get('/', [StockController::class, 'index']);
        Route::get('/delete/{id}', [StockController::class, 'destroy'])->name('delete.stock.product');
        Route::get('/create', [StockController::class, 'add']);
    
        Route::post('/', [StockController::class, 'store'])->name('product.stock.add');
        Route::get('/{id}/update', [StockController::class, 'update'])->name('product.stock.update');
        Route::post('/{id}/edit', [StockController::class, 'edit'])->name('product.stock.edit');


    });
    Route::prefix('supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::post('/', [SupplierController::class, 'create']);
        Route::put('/{id}', [SupplierController::class, 'update']);
        Route::delete('/{id}', [SupplierController::class, 'delete']);
    });
});



