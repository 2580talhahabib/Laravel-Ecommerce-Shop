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
                                                    <button
                                                        class="accordion-button collapsed {{ $categoryselected == $category->id ? 'show' : '' }}"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne-{{ $key }}"
                                                        aria-controls="collapseOne-{{ $key }}">

                                                        <span
                                                            style="{{ $categoryselected == $category->id ? 'color: #ffcc00' : '' }}">
                                                            {{ $category->name }}
                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseOne-{{ $key }}"
                                                    class="accordion-collapse collapse {{ $categoryselected == $category->id ? 'show' : '' }}"
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
                                                <a href="{{ route('front.shop', $category->slug) }}"
                                                    class="nav-item nav-link">
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
                                        <input class="form-check-input brand-label"
                                            {{ in_array($Brands->id, $brandArray) ? 'checked' : '' }} type="checkbox"
                                            value="{{ $Brands->id }}" id="flexCheckDefault-{{ $Brands->id }}">
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
                            <input type="text" class="js-range-slider" name="my_range" value="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-end mb-4">
                                <div class="ml-2">
                                    <select name="sort" id="sort" class="form-control">
                                        <option value="price_latest" {{ ($sort == 'price_latest' ) ? 'selected' :  ''}}>Latest</option>
                                        <option value="price_high"     {{ ($sort == 'price_high' ) ? 'selected' :  ''}}>Price High</option>
                                        <option value="price_low"     {{ ($sort == 'price_low' ) ? 'selected' :  ''}}>Price Low</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="card product-card">
                                        <div class="product-image position-relative">
                                            <a href="{{ route('front.product', [$product->slug]) }}" class="product-img"><img class="card-img-top"
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
                            {{ $products->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: {{ $min ?? 0  }},
        step: 10,
        to: {{ $max ?? 1000  }},
        skin: "round",
        max_postfix: "+",
        prefix: "$",
        onFinish: function($image) {
            getready();
        }
    });
    var slider = $(".js-range-slider").data("ionRangeSlider");


    // var slider=$("")

        $('.brand-label').change(function() {
            getready()
        })

        $('#sort').change(function(){
            getready();
        })

        function getready() {
            var brand = [];
            $('.brand-label').each(function() {
                if ($(this).is(":checked") == true) {
                    brand.push($(this).val());
                }
            })
            var url = '{{ url()->current() }}?';
            url += '&min_price='+slider.result.from+'&max_price='+slider.result.to;
            if(brand.length >0){
                url +='&brand=' + brand.toString();
            }

        //    for sorting
        url += '&sort='+$('#sort').val();

            window.location.href = url ;
            // console.log(brand.push())

        }
    })


</script>
