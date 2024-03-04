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
                            <form method="POST" action="{{ route('admin.category.store') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label>Icon</label>
                                    <button class="btn btn-primary" data-selected-class="btn-danger"
                                    data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
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
