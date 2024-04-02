<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSell;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct(string $slug){
        $flashSaleDate = FlashSell::first();
        $product = Product::with(['vendor','category','productImageGalleries','variants','brand'])->where('slug',$slug)->where('status',1)->first();
        return view('frontend.pages.product-detail',compact('product','flashSaleDate'));
    }
}
