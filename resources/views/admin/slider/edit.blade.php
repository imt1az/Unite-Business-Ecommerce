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
                            <h4>Edit Slider</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.slider.update',$slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200" src="{{ asset($slider->banner) }}" alt="" srcset="">
                                </div>
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input type="file"  name="banner"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" value="{{ $slider->type }}" name="type" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" value="{{ $slider->title }}" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Starting Price</label>
                                    <input type="text" value="{{ $slider->starting_price }}" name="starting_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Button URL</label>
                                    <input type="text" value="{{ $slider->btn_url }}" name="btn_url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" value="{{ $slider->serial }}" name="serial" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" name="status" class="form-control">
                                      <option {{ $slider->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                      <option {{ $slider->status == 0 ? 'selected' : '' }} value="0" >Deactivate</option>
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
