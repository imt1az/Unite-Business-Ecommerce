<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email','vendor@gmail.com')->first();
        $vendor = new Vendor();
        $vendor->banner = 'uploads/vendor-profile/682626212_3d-illustration-person-with-glasses_23-2149436185.jpg';
        $vendor->shop_name = 'Vendor Shop';
        $vendor->phone = '12345';
        $vendor->email = 'vendor@gmail.com';
        $vendor->address = 'USA';
        $vendor->description = 'Myyyyyyyyyy Shop';
        $vendor->user_id = $user->id;
 
        $vendor->save();
    }
}
