@extends('admin.layouts.master')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Brand</h1>

        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Brand</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.brand.update',$brand->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200" src="{{ asset($brand->logo) }}" alt="" srcset="">
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value={{$brand->name}} class="form-control">
                                </div>
                            
                                <div class="form-group col-md-4">
                                    <label for="inputState">Is Featured</label>
                                    <select id="inputState" name="is_featured" class="form-control">
                                      <option value="">Select</option>
                                      <option {{ $brand->is_featured == 1 ? 'selected' : '' }} value="1">Yes</option>
                                      <option {{ $brand->is_featured == 0 ? 'selected' : '' }} value="0">No</option>
                              
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" name="status" class="form-control">
                                        <option {{ $brand->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $brand->status == 0 ? 'selected' : '' }} value="0" >Deactivate</option>
                                    </select>
                                  </div>
                                  <div class="card-footer">
                                    <button class="btn btn-primary">Submit</button>
                                  </div>
                            </form>
                           
                        </div>

                    </div>
                </div>

            </div>
    </section>
@endsection
