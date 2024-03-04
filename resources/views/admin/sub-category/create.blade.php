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
                            <h4>Sub Category</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.sub-category.store') }}">
                                @csrf
                                <div class="form-group col-md-4">
                                    <label for="inputState">Category</label>
                                    <select id="inputState" name="category" class="form-control">
                                        <option value="" >Select</option>
                                        @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sub-Category Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" name="status" class="form-control">
                                        <option value="1" selected="">Active</option>
                                        <option value="0">Deactivate</option>
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
