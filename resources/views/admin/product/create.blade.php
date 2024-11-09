@extends('layouts.app')
@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Product</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="products.html" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <form action="{{ route('Product.store') }}" method="POST">
            @csrf
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="title">Title</label>
                                                <input type="text" value="{{ old('title') }}" name="title"
                                                    id="title"
                                                    class="form-control @error('title')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="Title">
                                                @error('title')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" cols="90" rows="10"
                                                    class="summernote text-center @error('description')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="Enter Your Descripition"></textarea>
                                                @error('description')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <label class="h4 mb-3 form-label">Media</label>
                                    <div id="image">
                                        <input type="file"
                                            class="form-control @error('image')
                                                    is-invalid
                                                @enderror"
                                            name="image" id="">
                                        @error('image')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Pricing</h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" id="price"
                                                    class="form-control @error('price')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="Price">
                                                @error('price')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="compare_price">Compare at Price</label>
                                                <input type="text" name="compare_price" id="compare_price"
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
                                                <input type="text" name="sku" id="sku"
                                                    class="form-control @error('sku')
                                                    is-invalid
                                                @enderror"
                                                    placeholder="sku">
                                                @error('sku')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="barcode">Barcode</label>
                                                <input type="text" name="barcode" id="barcode" class="form-control"
                                                    placeholder="Barcode">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="hidden" value="No">
                                                    <input class="custom-control-input" type="checkbox" id="track_qty"
                                                        value="Yes"
                                                        name="track_qty @error('track_qty')
                                                    is-invalid
                                                @enderror"
                                                        checked>
                                                    @error('track_qty')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label for="track_qty" class="custom-control-label ">Track
                                                        Quantity</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" min="0" name="qty" id="qty"
                                                    class="form-control" placeholder="Qty">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="hidden" value="No">
                                                    <input class="custom-control-input" type="checkbox" id="track_qty"
                                                        value="Yes" name="track_qty"
                                                        @error('track_qty') is-invalid @enderror checked
                                                        onchange="toggleInputFields()">
                                                    @error('track_qty')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label for="track_qty" class="custom-control-label">Track
                                                        Quantity</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Example of inputs that will be enabled/disabled -->
                                        <div class="col-md-12">
                                            <input type="text" id="quantity_input" class="form-control"
                                                placeholder="Enter Quantity" disabled>
                                        </div>
                                     


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
                                            <option value="1">Active</option>
                                            <option value="0">Block</option>
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
                                                <option value="">{{ $categories->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category">Sub category</label>
                                        <select name="sub_category" id="sub_category" class="form-control">
                                            <option value="">Select a SubCategory</option>
                                            @foreach ($subcategory as $subcategories)
                                                <option value="">{{ $subcategories->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Product brand</h2>
                                    <div class="mb-3">
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select a Brand </option>
                                            @foreach ($Brand as $Brands)
                                                <option value="">{{ $Brands->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Featured product</h2>
                                    <div class="mb-3">
                                        <select name="is_featured" id="status" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary" id="createButton">Create</button>
                        <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </div>
                <!-- /.card -->
            </section>
        </form>
        <!-- /.content -->
    </div>

    
<script>
    function toggleInputFields() {
        // Get the checkbox element
        const checkbox = document.getElementById('track_qty');

        // Get the inputs to enable/disable
        const quantityInput = document.getElementById('quantity_input');
      

        // Enable or disable inputs based on checkbox state
        if (checkbox.checked) {
            quantityInput.disabled = false;
           
        } else {
            quantityInput.disabled = true;
            
        }
    }

    // Run the function on page load to set the correct state initially
    document.addEventListener('DOMContentLoaded', toggleInputFields);
</script>
@endsection
