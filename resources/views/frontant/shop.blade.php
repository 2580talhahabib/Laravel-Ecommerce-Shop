@extends('layouts.front')
@section('content')
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-6 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="sub-title">
                        <h2>Categories</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="accordion accordion-flush" id="accordionExample">
                                @if ($categories->isNotEmpty())
                                @foreach ($categories as $key => $category)
                                    <div class="accordion-item">
                                        {{-- Check if the category has subcategories --}}
                                        @if ($category && $category->subcategory->isNotEmpty())
                                            <h2 class="accordion-header" id="headingOne-{{ $key }}">
                                                <button class="accordion-button collapsed {{ ($categoryselected == $category->id ) ? 'show' : ''}}" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne-{{ $key }}"
                                                        aria-controls="collapseOne-{{ $key }}">

                                                        <span
                                                        style="{{ $categoryselected == $category->id ? 'color: #ffcc00' : '' }}">
                                                        {{ $category->name }}
                                                    </span>
                                                </button>
                                            </h2>
                                            <div id="collapseOne-{{ $key }}"
                                                 class="accordion-collapse collapse {{ ($categoryselected == $category->id ) ? 'show' : '' }}"
                                                 aria-labelledby="headingOne-{{ $key }}"
                                                 data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="navbar-nav">
                                                        @foreach ($category->subcategory as $subcat)
                                                            <a href="{{ route('front.shop', [$category->slug, $subcat->slug]) }}"
                                                               class="nav-item nav-link">
                                                               <span
                                                            style="{{ $subcategoryselected == $subcat->id ? 'color: blue' : '' }}">
                                                            {{ $subcat->name }}
                                                        </span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            {{-- If no subcategories, just link to the category --}}
                                            <a href="{{ route('front.shop', $category->slug) }}" class="nav-item nav-link">
                                                <span
                                                style="{{ $categoryselected == $category->id ? 'color:green ' : '' }}">
                                                {{ $category->name }}
                                            </span>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            @endif

                            </div>
                        </div>
                    </div>

                    <div class="sub-title mt-5">
                        <h2>Brand</h3>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            @if ($Brand->isNotEmpty())
                                @foreach ($Brand as $Brands)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input brand-label" {{ (in_array($Brands->id,$brandArray)) ? 'checked' :'' }} type="checkbox" value="{{ $Brands->id }}"
                                            id="flexCheckDefault-{{ $Brands->id }}">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $Brands->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>

                    <div class="sub-title mt-5">
                        <h2>Price</h3>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    $0-$100
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $100-$200
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $200-$500
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $500+
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-end mb-4">
                                <div class="ml-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown">Sorting</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Latest</a>
                                            <a class="dropdown-item" href="#">Price High</a>
                                            <a class="dropdown-item" href="#">Price Low</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="card product-card">
                                        <div class="product-image position-relative">
                                            <a href="" class="product-img"><img class="card-img-top"
                                                    src="{{ asset('/storage/product/' . $product->image) }}"
                                                    alt=""></a>
                                            <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                            <div class="product-action">
                                                <a class="btn btn-dark" href="#">
                                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <a class="h6 link" href="product.php">{{ $product->title }}</a>
                                            <div class="price mt-2">
                                                <span class="h5"><strong>{{ $product->price }}</strong></span>
                                                @if ($product->compare_price > 0)
                                                    <span
                                                        class="h6 text-underline"><del>{{ $product->compare_price }}</del></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="col-md-12 pt-5">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"
                                            aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
$('.brand-label').change(function(){
 getready()
})
function getready(){
    var brand=[];
        $('.brand-label').each(function(){
           if($(this).is(":checked")==true){
         brand.push($(this).val());
           }
        })
        var url='{{ url()->current() }}?';
        window.location.href=url+'&brand='+brand.toString()
console.log(brand.push())

}
})
</script>
