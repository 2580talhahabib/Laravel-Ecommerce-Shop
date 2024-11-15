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
    <section class="content">
        <!-- Default box -->
        <form action="" id="addForm">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                        <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                                                   
                                </div>
                            </div>	                                                                      
                        </div>
                        <div class="card mb-3">
                         <label for="" >Image</label>
                         <input type="file" name="" id="">                                                                      
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price">	
                                        <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
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
                                            <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
                                            <p></p>	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" checked>
                                                <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">	
                                        </div>
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
                                        <option value="">Electronics</option>
                                        <option value="">Clothes</option>
                                        <option value="">Furniture</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Mobile</option>
                                        <option value="">Home Theater</option>
                                        <option value="">Headphones</option>
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Product brand</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Apple</option>
                                        <option value="">Vivo</option>
                                        <option value="">HP</option>
                                        <option value="">Samsung</option>
                                        <option value="">DELL</option>
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured"  class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>                                                
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                        </div>                                 
                    </div>
                </div>
                
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>

      
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
    $("#addForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url:"{{ route('Product.store') }}",
        type:'post',
        data:$("#addForm").serialize(),
        dataType:'json',
        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        success:function(response){
          if(response.status == false){
let error=response.errors;
if(error){
    if(error.title){
    $('#title').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error.title[0]);
  }else{
    $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text('');
  }
  if(error.price){
    $('#price').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error.price[0]);
  }else{
    $('#price').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text('');
  }
  if(error.category){
    $('#category').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error.category[0]);
  }else{
    $('#category').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text('');
  }
  if (error.is_featured) {
    $('#is_featured').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error.is_featured[0]);
} else {
    $('#is_featured').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text('');
}
  if (error.sku) {
    $('#sku').addClass('is-invalid').siblings('p').addClass('invalid-feedback').text(error.sku[0]);
} else {
    $('#sku').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').text('');
}


}
          }
        }
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

</script>

@endsection