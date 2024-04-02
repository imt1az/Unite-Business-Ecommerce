<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\DataTables\FlashSellDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSell;
use App\Models\FlashSellItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSellController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable){
        $flashSellDate = FlashSell::first();
        $products = Product::where('is_approved',1)->where('status',1)->orderBy('id','DESC')->get();
        return $dataTable->render('admin.flash-sale.index',compact('flashSellDate','products'));
    }

    public function update(Request $request){
        $request->validate([
            'end_date'=>['required']
        ]);
        FlashSell::updateOrCreate(
            ['id'=>1],
            ['end_date'=>$request->end_date]
        );

        toastr('Updated Successfully','success','Success');
        return redirect()->back();
    }

    public function addProduct(Request $request){
        $request->validate([
            'product' => ['required','unique:flash_sell_items,product_id'],
            'show_at_home' => ['required'],
            'status' => ['required'],
        ]);
        
        $flashSaleDate = FlashSell::first();

        $flashSaleItem = new FlashSellItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = $flashSaleDate->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;

        $flashSaleItem->save();
        toastr('Product Added Successfully!','success','Success');
        return redirect()->back();
    }
    public function chageShowAtHomeStatus(Request $request)
    {
        $flashSaleItem = FlashSellItem::findOrFail($request->id);
        $flashSaleItem->show_at_home = $request->status == 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Status has been updated!']);
    }

    public function changeStatus(Request $request)
    {
        $flashSaleItem = FlashSellItem::findOrFail($request->id);
        $flashSaleItem->status = $request->status == 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Status has been updated!']);
    }

    public function destory(string $id)
    {
        $flashSaleItem = FlashSellItem::findOrFail($id);
        $flashSaleItem->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
