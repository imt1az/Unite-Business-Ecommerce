<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageUploadTraits;

class VendorShopProfileController extends Controller
{
    use ImageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Vendor::where('user_id',Auth::user()->id)->first();
        return view('vendor.shop-profile.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner'=>['nullable','image','max:3000'],
            'shop_name'=>['required','max:250'],
            'phone'=>['required','max:50'],
            'email'=>['required','email','max:150'],
            'address'=>['required'],
            'description'=>['required'],
            'fb_link'=>['nullable','url'],
            'tw_link'=>['nullable','url'],
            'insta_link'=>['nullable','url'],
        ]);

        $vendor = Vendor::where('user_id',Auth::user()->id)->first();
        $bannerPAth = $this->updateImage($request,'banner','uploads/vendor-profile',$vendor->banner);
        $vendor->banner = empty(!$bannerPAth) ? $bannerPAth : $vendor->banner;
        $vendor->shop_name = $request->shop_name;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email    ;
        $vendor->address = $request->address;
        $vendor->description = $request->description;
        $vendor->fb_link = $request->fb_link;
        $vendor->tw_link = $request->tw_link;
        $vendor->insta_link = $request->insta_link;

        $vendor->save();

        toastr('Updated Successfully!','success');
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}