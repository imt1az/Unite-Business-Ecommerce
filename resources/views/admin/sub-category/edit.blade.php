@extends('admin.layouts.master')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Sub-Category</h1>

        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sub Category</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.sub-category.update',$subCategory->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group col-md-4">
                                    <label for="inputState">Category</label>
                                    <select id="inputState" name="category" class="form-control">
                                        <option value="" >Select</option>
                                        @foreach ($categories as $item)
                                        <option {{ $item->id == $subCategory->category_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sub-Category Name</label>
                                    <input type="text" name="name" value="{{ $subCategory->name }}" class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" name="status" class="form-control">
                                        <option {{ $subCategory->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $subCategory->status == 0 ? 'selected' : '' }} value="0" >Deactivate</option>
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
