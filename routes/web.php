<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController as AdminSubCategoryController;

use App\Http\Middleware\IsAdmin;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;




// AdminLoginController
Route::get('admin/register', [AdminLoginController::class, 'register'])->name('admin.register');
Route::post('admin/registerauth', [AdminLoginController::class, 'registerauth'])->name('admin.registerauth');
Route::get('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('admin/loginAuth', [AdminLoginController::class, 'loginAuth'])->name('admin.loginAuth');

// HomeController (with middleware group)
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    // CategoryController
    Route::get('admin/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('admin/category/Destroy/{id}', [CategoryController::class, 'Destroy'])->name('category.Destroy');
    // SubCategoryController 
    Route::get('admin/subcategory/index', [AdminSubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('admin/subcategory/create', [AdminSubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('admin/subcategory/store', [AdminSubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('admin/subcategory/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::put('admin/subcategory/update/{id}', [AdminSubCategoryController::class, 'update'])->name('subcategory.update');
    Route::post('admin/subcategory/destroy/{id}', [AdminSubCategoryController::class, 'destroy'])->name('subcategory.destroy');
    // BrandController 
    
    Route::get('admin/Brand/index', [BrandController::class, 'index'])->name('Brand.index');
    Route::get('admin/Brand/create', [BrandController::class, 'create'])->name('Brand.create');
    Route::post('admin/Brand/store', [BrandController::class, 'store'])->name('Brand.store');
    Route::get('admin/Brand/edit/{id}', [BrandController::class, 'edit'])->name('Brand.edit');
    Route::post('admin/Brand/update/{id}', [BrandController::class, 'update'])->name('Brand.update');
    Route::post('admin/Brand/destroy/{id}', [BrandController::class, 'destroy'])->name('Brand.destroy');

    // ProductController
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('Product.create');
    Route::post('admin/Product/store', [ProductController::class, 'store'])->name('Product.store');

});










