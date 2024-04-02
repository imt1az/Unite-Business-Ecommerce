<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTraits;
use Illuminate\Support\Facades\Auth;
use Str;

class VendorProductController extends Controller
{
    use ImageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index(VendorProductDataTable $dataTable)
    {
        
        return $dataTable->render('vendor.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('vendor.product.create',compact('categories','brands'));
    }

    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subCategories;
    }

    public function getChildSubCategories(Request $request){
        $childCategories = ChildCategory::where('sub_category_id',$request->id)->where('status',1)->get();
        return $childCategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' =>['required','image','max:200'],
            'name'=>['required','max:200'],
            'category'=>['required'],
            'price'=>['required'],
            'qty'=>['required'],
            'short_description'=>['required','max:500'],
            'long_description'=>['required'],
            'product_type'=>['required'],
            'brand'=>['required'],
            
            'seo_title'=>['nullable','max:200'],
            'seo_description'=>['nullable','max:200'],
            'status' =>['required']
          ]);
         
    
          $product = new Product();
          $imagePath = $this->uploadImage($request,'image','uploads/product');
          $product->image = $imagePath;
          $product->name = $request->name;
          $product->slug = Str::slug($request->name);
          $product->vendor_id = Auth::user()->vendor->id;
          $product->category_id = $request->category;
          $product->sub_category_id = $request->sub_category;
          $product->child_category_id = $request->child_category;
          $product->brand_id = $request->brand;
          $product->qty = $request->qty;
          $product->price = $request->price;
          $product->offer_price = $request->offer_price;
          $product->offer_start_date = $request->offer_start_date;
          $product->offer_end_date = $request->offer_end_date;
          $product->qty = $request->qty;
          $product->short_description = $request->short_description;
          $product->long_description = $request->long_description;
          $product->product_type = $request->product_type;
          
          $product->seo_title = $request->seo_title;
          $product->seo_description = $request->seo_description;
          $product->status = $request->status;
          $product->is_approved = 0;
    
          $product->save();
          toastr('Created Successfully','success');
          return redirect()->route('vendor.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        
        if($product->vendor_id !== Auth::user()->id){
            abort(404);
          }
        $subCategories = SubCategory::where('category_id',$product->category_id)->get();
        $childCategories = ChildCategory::where('sub_category_id',$product->sub_category_id)->get();
        $categories = Category::all();
        $brands = Brand::all();
      return view('vendor.product.edit',compact('product','categories','brands','subCategories','childCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' =>['nullable','image','max:200'],
            'name'=>['required','max:200'],
            'category'=>['required'],
            'price'=>['required'],
            'qty'=>['required'],
            'short_description'=>['required','max:500'],
            'long_description'=>['required'],
            'product_type'=>['required'],
            'brand'=>['required'],
            
            'seo_title'=>['nullable','max:200'],
            'seo_description'=>['nullable','max:200'],
            'status' =>['required']
          ]);
         
    
          $product = Product::findOrFail($id);

          if($product->vendor_id !== Auth::user()->id){
            abort(404);
          }

          $imagePath = $this->updateImage($request,'image','uploads/product',$product->image);

          $product->image = empty(!$imagePath) ? $imagePath : $product->image;
          $product->name = $request->name;
          $product->slug = Str::slug($request->name);
          $product->vendor_id = Auth::user()->vendor->id;
          $product->category_id = $request->category;
          $product->sub_category_id = $request->sub_category;
          $product->child_category_id = $request->child_category;
          $product->brand_id = $request->brand;
          $product->qty = $request->qty;
          $product->price = $request->price;
          $product->offer_price = $request->offer_price;
          $product->offer_start_date = $request->offer_start_date;
          $product->offer_end_date = $request->offer_end_date;
          $product->qty = $request->qty;
          $product->short_description = $request->short_description;
          $product->long_description = $request->long_description;
          $product->product_type = $request->product_type;
          
          $product->seo_title = $request->seo_title;
          $product->seo_description = $request->seo_description;
          $product->status = $request->status;
          $product->is_approved =  $product->is_approved;
    
          $product->save();
          toastr('Updated Successfully','success');
          return redirect()->route('vendor.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $product = Product::findOrFail($id);
        if($product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }

        /** Delte the main product image */
        $this->deleteImage($product->image);

        /** Delete product gallery images */
        $galleryImages = ProductImageGallery::where('product_id', $product->id)->get();
        foreach($galleryImages as $image){
            $this->deleteImage($image->image);
            $image->delete();
        }

        /** Delete product variants if exist */
        $variants = ProductVariant::where('product_id', $product->id)->get();

        foreach($variants as $variant){
            $variant->productVariantItems()->delete();
            $variant->delete();
        }

        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
    public function changeStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();

        return response(['message' => 'Status has been updated!']);
    }
}
