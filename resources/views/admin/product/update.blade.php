@extends('layouts.app')
@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Product</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="products.html" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <form id="addForm" enctype="multipart/form-data" type="post"
                action="{{ route('Product.update', $edit->id) }}">
                {{-- @method('PUT') --}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="title">Title</label>
                                                <input type="text" value="{{ $edit->title }}" name="title"
                                                    id="title" class="form-control" placeholder="Title">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="title">Slug</label>
                                                <input type="text" value="{{ $edit->slug }}" name="slug"
                                                    id="slug" class="form-control" placeholder="Title">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <textarea name="description" value="{{ $edit->description }}" id="description" placeholder="Description">
                                                    {{ old('description', $edit->description) }}
                                                </textarea>
                                            </div>
                                        </div>
                                        {{-- short desc --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description">Short Description</label>
                                                <textarea name="short_desc" id="short_desc" placeholder="Description">
                                                    {{ old('short_desc', $edit->short_desc) }}
                                                </textarea>
                                            </div>
                                        </div>
                                        {{-- shipping returns --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description">Shipping Returns</label>
                                                <textarea name="shiping_returns" id="shiping_returns" placeholder="Description">
                                                    {{ old('shiping_returns', $edit->shiping_returns) }}

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <p></p>
                            </div>
                            @if ($edit->image)
                                <div class="image-container">
                                    <h1>This is the image upload</h1>
                                    <img src="{{ asset('/storage/product/' . $edit->image) }}" height="20%" width="100%"
                                        alt="Product Image">
                                </div>
                            @endif


                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Pricing</h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" value="{{ $edit->price }}"
                                                    id="price" class="form-control" placeholder="Price">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="compare_price">Compare at Price</label>
                                                <input type="text" name="compare_price"
                                                    value="{{ $edit->compare_price }}" id="compare_price"
                                                    class="form-control" placeholder="Compare Price">
                                                <p class="text-muted mt-3">
                                                    To show a reduced price, move the product’s original price into Compare
                                                    at price. Enter a lower value into Price.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Inventory</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sku">SKU (Stock Keeping Unit)</label>
                                                <input type="text" value="{{ $edit->sku }}" name="sku"
                                                    id="sku" class="form-control" placeholder="sku">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="barcode">Barcode</label>
                                                <input type="text" name="barcode" value="{{ $edit->barcode }}"
                                                    id="barcode" class="form-control" placeholder="Barcode">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="custom-control ">
                                                    <label for="track_qty" class="form-label">Track Quantity</label>
                                                    <input type="number" value="{{ $edit->qty }}" min="0"
                                                        name="qty" id="qty" class="form-control"
                                                        placeholder="Qty">
                                                    <p></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- related products  --}}
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Related product</h2>
                                    <div class="mb-3">
                                        <select multiple class="related_product w-100" name="related_products[]"
                                            id="related_products">
                                            @if (!empty($relatedproducts))
                                            @foreach ($relatedproducts as $relatedproduct)
                                            <option selected value="{{ $relatedproduct->id }}">{{ $relatedproduct->title }}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Product status</h2>
                                    <div class="mb-3">
                                        <select name="status" id="status" class="form-control">

                                            <option {{ $edit->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $edit->status == 0 ? 'selected' : '' }} value="0">Block
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="h4  mb-3">Product category</h2>
                                    <div class="mb-3">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select a Category</option>
                                            @foreach ($category as $categories)
                                                <option value="{{ $categories->id }}"
                                                    {{ $categories->name ? 'selected' : '' }}>{{ $categories->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <p></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category">Sub category</label>
                                        <select name="sub_category" id="sub_category" class="form-control">
                                            <option value="">Select a Category</option>
                                            @foreach ($subcategory as $subcategories)
                                                <option value="{{ $subcategories->id }}"
                                                    {{ $subcategories->name ? 'selected' : '' }}>
                                                    {{ $subcategories->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Product brand</h2>
                                    <div class="mb-3">
                                        <select name="brand" id="status" class="form-control">
                                            <option value="">Apple</option>
                                            @foreach ($Brand as $Brands)
                                                <option value="">Apple</option>
                                                <option value="{{ $Brands->id }}"
                                                    {{ $Brands->name ? 'selected' : '' }}>{{ $Brands->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Featured product</h2>
                                    <div class="mb-3">
                                        <select name="is_featured" id="is_featured" class="form-control">
                                            <option value="0" {{ $edit->is_featured ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $edit->is_featured ? 'selected' : '' }}>Yes</option>
                                        </select>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('Product.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </div>
            </form>


            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // categor dependent dropdown
        $("#category").change(function() {
            let categories = $("#category").val();
            $.ajax({
                url: "{{ route('product-subcategories.index') }}",
                type: 'GET',
                data: {
                    categories: categories
                },
                dataType: 'json',
                success: function(response) {
                    $('#sub_category').empty().append('<option value="">Select a Subcategory</option>');
                    response.subCategories.forEach(function(subcategory) {
                        $('#sub_category').append('<option value="' + subcategory.id + '">' +
                            subcategory.name + '</option>');
                    });

                }
            })
        })

        $(document).ready(function() {
            $('.related_product').select2({
                ajax: {
                    url: '{{ route('Product.getProducts') }}',
                    dataType: 'json',
                    tags: true,
                    multiple: true,
                    minimumInputLength: 3,
                    processResults: function(data) {
                        return {
                            results: data.results
                        };
                    }
                }
            });

            $("#addForm").submit(function(e) {
                e.preventDefault();
                var formdata = new FormData(this);
                var url = $(this).attr('action')


                $.ajax({
                    url: url,
                    type: 'post',
                    data: formdata,
                    dataType: 'json',
                    processData: false, // Don't process the data
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == true) {
                            console.log(response)

                            window.location.href =
                                "{{ route('Product.index') }}?status=success&message=Product updated successfully";


                        } else {
                            console.log(response)
                            let error = response.errors;
                            if (error.title) {
                                $("#title").addClass('is-invalid').siblings('p').addClass(
                                    'invalid-Feedback text text-danger').text(error.title)
                            } else {
                                $("#title").removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback text text-danger').text('')
                            }
                            if (error.slug) {
                                $("#slug").addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback text text-danger').text(error.slug)
                            } else {
                                $("#slug").removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback text text-danger').text('')
                            }
                            if (error.price) {
                                $("#price").addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback text text-danger').text(error.price)
                            } else {
                                $("#price").removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback text text-danger').text('')
                            }
                            if (error.sku) {
                                $("#sku").addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback text text-danger').text(error.sku)
                            } else {
                                $("#sku").removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback text text-danger').text('')
                            }
                            if (error.qty) {
                                $("#qty").addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback text text-danger').text(error.qty)
                            } else {
                                $("#qty").removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback text text-danger').text('')
                            }
                            if (error.category) {
                                $("#category").addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback text text-danger').text(error
                                    .category)
                            } else {
                                $("#category").removeClass('is-invalid').siblings('p')
                                    .removeClass('invalid-feedback text text-danger').text('')
                            }

                        }
                    },


                })
            })
        })
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });

        });
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#short_desc'))
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });

        });
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#shiping_returns'))
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });

        });
    </script>
@endsection
