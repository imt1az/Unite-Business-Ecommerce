@extends('vendor.layouts.master')



@section('content')
    <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <div class="dashboard_content mt-2 mt-md-0">
                <h3><i class="far fa-user"></i>Shop profile</h3>
                <div class="wsus__dashboard_profile">
                    <div class="wsus__dash_pro_area">
                        <h4>basic information</h4>

                        <div class="card-body">
                            <form method="POST" action="{{ route('vendor.shop-profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200" src="{{ asset($profile->banner) }}" alt="" srcset="">
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Banner</label>
                                    <input type="file" name="banner"class="form-control">
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Shop Name</label>
                                    <input type="text" name="shop_name" value="{{ $profile->shop_name }}" class="form-control">
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ $profile->phone }}" class="form-control">
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Email</label>
                                    <input type="text" name="email"  value="{{ $profile->email }}" class="form-control">
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ $profile->address }}" class="form-control">
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Description</label>
                                    <textarea class="summernote" name="description">{{ $profile->description }}</textarea>
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Facebook</label>
                                    <input type="text" name="fb_link" value="{{ $profile->fb_link }}" class="form-control">
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Twitter</label>
                                    <input type="text" name="tw_link" value="{{ $profile->tw_link }}" class="form-control">
                                </div>
                                <div class="form-group wsus_input input">
                                    <label>Instagram</label>
                                    <input type="text" name="insta_link" value="{{ $profile->insta_link }}" class="form-control">
                                </div>
                               
                                  <div class="card-footer">
                                    <button class="btn btn-primary">Update</button>
                                  </div>
                            </form>
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
