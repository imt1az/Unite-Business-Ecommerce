
<?php
// Admin Routes

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');

// Profile
Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
Route::post('password/update',[ProfileController::class,'updatePassword'])->name('password.update');

// Slider
Route::resource('slider', SliderController::class);
// Category
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category',CategoryController::class);
// Sub_category
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('subcategory.change-status');
Route::resource('sub-category',SubCategoryController::class);
// Child-Category
Route::get('get-subCategories',[ChildCategoryController::class,'getSubCategories'])->name('get-subcategories');
Route::resource('child-category',ChildCategoryController::class);