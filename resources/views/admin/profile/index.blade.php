@extends('admin.layouts.master')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">


            <div class="row mt-sm-4">

                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" action="{{ route('admin.profile.update') }}" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}">

                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ Auth::user()->email }}">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="mb-3">
                                            <img width="100px" src="{{ asset(Auth::user()->image) }}" alt="">
                                        </div>
                                        <label>User Name</label>
                                        <input type="file" class="form-control" name="image">

                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>




                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                    
                        <form method="POST" action="{{ route('admin.password.update') }}" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Cuurent Password</label>
                                        <input type="password" class="form-control" name="current_password">

                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="password">

                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">

                                    </div>

                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
