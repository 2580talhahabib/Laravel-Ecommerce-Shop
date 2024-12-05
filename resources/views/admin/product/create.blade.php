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
                    <a href="{{ route('Product.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form  id="addForm" enctype="multipart/form-data">

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
                                            <label for="title">Slug</label>
                                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Title">
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
                         <input type="file" name="image" id="image" class="form-control">    
                         <p></p>                                                                  
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
                                            <div class="custom-control ">
                                                <label for="track_qty" class="form-label">Track Quantity</label>
                                                <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">
                                                <p></p>	
                                            </div>
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
                                        <option value="">Select a Category</option>
                                        @foreach ($category as $categories)
                                        <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    <p></p>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        {{-- <option value="">Select a Category</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Product brand</h2>
                                <div class="mb-3">
                                    <select name="brand" id="status" class="form-control">
                                        <option value="">Select the Brand</option>
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

// categor dependent dropdown 
$("#category").change(function(){
   let categories=$("#category").val();
    $.ajax({
        url:"{{ route('product-subcategories.index') }}",
        type:'GET',
        data:{categories:categories},
        dataType:'json',
        success:function(response){
            $('#sub_category').empty().append('<option value="">Select a Subcategory</option>');
            response.subCategories.forEach(function(subcategory){
                $('#sub_category').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
            });
            
        }
    })
})

    $(document).ready(function(){
    $("#addForm").submit(function(e){
    e.preventDefault();
 var formdata=new FormData(this);
 
       
    $.ajax({
        url:"{{ route('Product.store') }}",
        type:'post',
        data:formdata,
        dataType:'json',
        processData: false,  // Don't process the data
         contentType: false,
        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        success:function(response){
            if(response.status == true){
                console.log(response)
            // window.location.href = "{{ route('Product.index') }}";
            window.location.href = "{{ route('Product.index') }}?status=success&message=Product created successfully";


            }else{
                let error=response.errors;
            if(error.title){
                $("#title").addClass('is-invalid').siblings('p').addClass('invalid-feeback text text-danger').text(error.title)
            }else{
                $("#title").removeClass('is-invalid').siblings('p').removeClass('invalid-feeback text text-danger').text('')  
            }
            if(error.slug){
                $("#slug").addClass('is-invalid').siblings('p').addClass('invalid-feeback text text-danger').text(error.slug)
            }else{
                $("#slug").removeClass('is-invalid').siblings('p').removeClass('invalid-feeback text text-danger').text('')  
            }
            if(error.price){
                $("#price").addClass('is-invalid').siblings('p').addClass('invalid-feeback text text-danger').text(error.price)
            }else{
                $("#price").removeClass('is-invalid').siblings('p').removeClass('invalid-feeback text text-danger').text('')  
            }
            if(error.sku){
                $("#sku").addClass('is-invalid').siblings('p').addClass('invalid-feeback text text-danger').text(error.sku)
            }else{
                $("#sku").removeClass('is-invalid').siblings('p').removeClass('invalid-feeback text text-danger').text('')  
            }
            if(error.qty){
                $("#qty").addClass('is-invalid').siblings('p').addClass('invalid-feeback text text-danger').text(error.qty)
            }else{
                $("#qty").removeClass('is-invalid').siblings('p').removeClass('invalid-feeback text text-danger').text('')  
            }
            if(error.category){
                $("#category").addClass('is-invalid').siblings('p').addClass('invalid-feeback text text-danger').text(error.category)
            }else{
                $("#category").removeClass('is-invalid').siblings('p').removeClass('invalid-feeback text text-danger').text('')  
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

</script>

@endsection









