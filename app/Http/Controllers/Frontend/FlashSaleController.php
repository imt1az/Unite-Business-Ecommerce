<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSell;
use App\Models\FlashSellItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(){
        $flashSaleDate = FlashSell::first();
        $flashSaleItem = FlashSellItem::where('status',1)->orderBy('id','DESC')->paginate(20);
         return view('frontend.pages.flash-sale',compact('flashSaleDate','flashSaleItem'));
    }
}
