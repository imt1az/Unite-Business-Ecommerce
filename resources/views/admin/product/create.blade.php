@extends('admin.layouts.master')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>

        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label for="inputState">Category</label>
                                        <select id="inputState" name="category" class="form-control main-category">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="inputState">Sub Category</label>
                                        <select id="inputState" name="sub_category" class="form-control sub-category">
                                            <option value="">Select</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="inputState">Child Category</label>
                                        <select id="inputState" name="child_category" class="form-control child-category">
                                            <option value="">Select</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputState">Brand</label>
                                    <select id="inputState" name="brand" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($brands as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sku</label>
                                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Offer Price</label>
                                    <input type="text" name="offer_price" value="{{ old('offer_price') }}"
                                        class="form-control">
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Offer Start Date</label>
                                        <input type="text" name="offer_start_date" value="{{ old('offer_start_date') }}"
                                            class="form-control datepicker">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Offer End Date</label>
                                        <input type="text" name="offer_end_date" value="{{ old('offer_end_date') }}"
                                            class="form-control datepicker">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Stock Quantity</label>
                                    <input type="text" name="qty" value="{{ old('qty') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Video Link</label>
                                    <input type="text" name="video_link" value="{{ old('video_link') }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="short_description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea name="long_description" class="form-control summernote"></textarea>
                                </div>


                          
                                    <div class="form-group">
                                        <label for="inputState">Product Type</label>
                                        <select id="inputState" name="product_type" class="form-control">
                                            {{-- <option value="">Select</option> --}}
                                            <option value="new_arrival">New Arrival</option>
                                            <option value="featured_product">Featured</option>
                                            <option value="top_product">Top Product</option>
                                            <option value="best_product">Best Product</option>
                                        </select>
                                    </div>
                                  
                                   
                           

                                <div class="form-group">
                                    <label>Seo Title</label>
                                    <input type="text" name="seo_title" value="{{ old('seo_title') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Seo Description</label>
                                    <textarea name="seo_description" class="form-control"></textarea>
                                </div>
                               
                          
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" name="status" class="form-control">
                                        <option value="1" selected="">Active</option>
                                        <option value="0">Deactivate</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.sub-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })

            // Child Category
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-child-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.child-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })

        })
    </script>
@endpush
