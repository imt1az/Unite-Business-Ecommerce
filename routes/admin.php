
<?php
// Admin Routes

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\FlashSellController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
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
Route::put('childcategory/change-status', [ChildCategoryController::class, 'changeStatus'])->name('childcategory.change-status');
Route::resource('child-category',ChildCategoryController::class);

// Brand
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand',BrandController::class);

// Vendor
Route::resource('vendor-profile',AdminVendorProfileController::class);
// Product Routes
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::get('product/get-subcategories',[ProductController::class,'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-subcategories',[ProductController::class,'getChildSubCategories'])->name('product.get-child-subcategories');
Route::resource('products',ProductController::class);
// Product Image gallery
Route::resource('products-image-gallery',ProductImageController::class);
// Product Variant
Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant',ProductVariantController::class);

// Products variant Item Route
Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');

Route::get('products-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');

Route::put('products-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');

Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');

Route::put('products-variant-item-status', [ProductVariantItemController::class, 'chageStatus'])->name('products-variant-item.chages-status');


// Sellers Products
Route::get('seller-products',[SellerProductController::class,'index'])->name('seller-products.index');
Route::get('seller-pending-products',[SellerProductController::class,'pendingProducts'])->name('seller-pendingProducts.index');
Route::put('change-approve-status', [SellerProductController::class, 'changeApproveStatus'])->name('change-approve-status');

// Flash Sale
Route::get('flash-sale',[FlashSellController::class,'index'])->name('flash-sale.index');
Route::put('flash-sale',[FlashSellController::class,'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product',[FlashSellController::class,'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSellController::class, 'chageShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale-status', [FlashSellController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}', [FlashSellController::class, 'destory'])->name('flash-sale.destory');