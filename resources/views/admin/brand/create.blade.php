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
                            <h4>Create Brand</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo"class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            
                                <div class="form-group col-md-4">
                                    <label for="inputState">Is Featured</label>
                                    <select id="inputState" name="is_featured" class="form-control">
                                      <option value="">Select</option>
                                      <option value="1">Yes</option>
                                      <option value="0" >No</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" name="status" class="form-control">
                                      <option value="1" selected="">Active</option>
                                      <option value="0" >Deactivate</option>
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
