@extends('admin.layouts.master')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>

        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Slider</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.category.update',$category->id) }}">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label>Icon</label>
                                    <button class="btn btn-primary" data-icon="{{ $category->icon }}" data-selected-class="btn-danger"
                                    data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                                </div>
                            
                                <div class="form-group col-md-4">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" name="status" class="form-control">
                                      <option {{ $category->status ==1 ? 'selected' : '' }} value="1" selected="">Active</option>
                                      <option {{ $category->status ==0 ? 'selected' : '' }} value="0" >Deactivate</option>
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
