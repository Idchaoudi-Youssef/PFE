@extends('layouts.base')
@section('content')
<section class="pt-0 poster-section">
    <div class="poster-image slider-for custome-arrow classic-arrow">
        <div>
            <img src="assets/images/furniture-images/poster/1.png" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="assets/images/furniture-images/poster/2.png" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="assets/images/furniture-images/poster/3.png" class="img-fluid blur-up lazyload" alt="">
        </div>
    </div>
    <div class="slider-nav image-show">
        <div>
            <div class="poster-img">
                <img src="assets/images/furniture-images/poster/t2.jpg" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
        <div>
            <div class="poster-img">
                <img src="assets/images/furniture-images/poster/t1.jpg" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>

        </div>
        <div>
            <div class="poster-img">
                <img src="assets/images/furniture-images/poster/t3.jpg" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-contain">
        <div class="banner-left">
            <h4>Sale <span class="theme-color">35% Off</span></h4>
            <h1>New Latest <span>Dresses</span></h1>
            <p>BUY ONE GET ONE <span class="theme-color">FREE</span></p>
            <h2>$79.00 <span class="theme-color"><del>$65.00</del></span></h2>
            <p class="poster-details mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.</p>
        </div>
    </div>

    <div class="right-side-contain">
        <div class="social-image">
            <h6>Facebook</h6>
        </div>

        <div class="social-image">
            <h6>Instagram</h6>
        </div>

        <div class="social-image">
            <h6>Twitter</h6>
        </div>
    </div>
</section>
<!-- banner section start -->
<section class="ratio2_1 banner-style-2">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{route('shop.index')}}" class="banner-img">
                        <img src="assets/images/fashion/banner/1.jpg" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <div class="banner-detail">
                        <a href="javacript:void(0)" class="heart-wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <span class="font-dark-30">26% <span>OFF</span></span>
                    </div>
                    <a href="{{route('shop.index')}}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Clothes</h2>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{route('shop.informatique')}}" class="banner-img">
                        <img src="assets/images/fashion/banner/materiel-informatique-pro.jpg" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <div class="banner-detail">
                        <a href="javacript:void(0)" class="heart-wishlist">
                        </a>
                        <span class="font-dark-30">36% <span>OFF</span></span>
                    </div>
                    <a href="{{route('shop.informatique')}}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Electronics</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner section end -->

<section class="ratio_asos overflow-hidden">
    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>Our Category</h2>
                    <h5 class="theme-color">Our Collection (Clothes)</h5>
                </div>
            </div>
        </div>
        <style>
            .r-price {
                display: flex;
                flex-direction: row;
                gap: 20px;
            }

            .r-price .main-price {
                width: 100%;
            }

            .r-price .rating {
                padding-left: auto;
            }

            .product-style-3.product-style-chair .product-title {
                text-align: left;
                width: 100%;
            }

            @media (max-width:600px) {

                .product-box p,
                .product-box a {
                    text-align: left;
                }

                .product-style-3.product-style-chair .main-price {
                    text-align: right !important;
                }
            }
        </style>
        <div class="row g-sm-4 g-3">

            @foreach ($products as $product)
            <div class="col-xl-2 col-lg-2 col-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                            <img src="{{ asset('storage/'. $product->image) }}"
                                class="w-100 bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="circle-shape"></div>
                        <span class="background-text">Furniture</span>
                        <div class="label-block">
                            <span class="label label-theme">30% Off</span>
                        </div>
                        <div class="cart-wrap">
                            <ul>
                                
                                <li>
                                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="icon">
                                        <i class="fas fa-eye"></i>
                                    </a> 
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="addProductToWishlist({{$product->id}},'{{$product->name}}' ,1,{{$product->regular_price}})" class="wishlist">
                                        <i data-feather="heart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-style-3 product-style-chair">
                        <div class="product-title d-block mb-0">
                            <div class="r-price">
                                <div class="theme-color">${{$product->regular_price }} </div>
                                <div class="main-price">
                                    <ul class="rating mb-1 mt-0">
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="font-light mb-sm-2 mb-0">{{$product->name}}</p>
                            <a href="{{ url('product/details', $product->id) }}" class="font-default">
                                <h5>{{$product->short_description}}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="ratio_asos overflow-hidden">
    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>Our Category</h2>
                    <h5 class="theme-color">Our Collection (Electronics)</h5>
                </div>
            </div>
        </div>
        <style>
            .r-price {
                display: flex;
                flex-direction: row;
                gap: 20px;
            }

            .r-price .main-price {
                width: 100%;
            }

            .r-price .rating {
                padding-left: auto;
            }

            .product-style-3.product-style-chair .product-title {
                text-align: left;
                width: 100%;
            }

            @media (max-width:600px) {

                .product-box p,
                .product-box a {
                    text-align: left;
                }

                .product-style-3.product-style-chair .main-price {
                    text-align: right !important;
                }
            }
        </style>
        <div class="row g-sm-4 g-3">

            @foreach ($productss as $product)
            <div class="col-xl-2 col-lg-2 col-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                            <img src="{{ asset('storage/'. $product->image) }}"
                                class="w-100 bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="circle-shape"></div>
                        <span class="background-text">Furniture</span>
                        <div class="label-block">
                            <span class="label label-theme">30% Off</span>
                        </div>
                        <div class="cart-wrap">
                            <ul>
                                
                                <li>
                                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="icon">
                                        <i class="fas fa-eye"></i>
                                    </a> 
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="addProductToWishlist({{$product->id}},'{{$product->name}}' ,1,{{$product->regular_price}})" class="wishlist">
                                        <i data-feather="heart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-style-3 product-style-chair">
                        <div class="product-title d-block mb-0">
                            <div class="r-price">
                                <div class="theme-color">${{$product->regular_price }} </div>
                                <div class="main-price">
                                    <ul class="rating mb-1 mt-0">
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="font-light mb-sm-2 mb-0">{{$product->name}}</p>
                            <a href="{{ url('product/details', $product->id) }}" class="font-default">
                                <h5>{{$product->short_description}}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- category section start -->
<section class="category-section ratio_40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title title-2 text-center">
                    <h2>Our Category</h2>
                    <h5 class="text-color">Our collection</h5>
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <h2 class="light-text">Top</h2>
                        <h2 class="top-spacing">Our Top</h2>
                        <span>Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">
                    <div>
                        <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                            <img src="assets/images/fashion/category/1.jpg" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Shoes</h3>
                                <span class="text-dark">Fashion</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                            <img src="assets/images/fashion/category/2.jpg" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Men</h3>
                                <span class="text-dark">Fashion</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                            <img src="assets/images/fashion/category/3.jpg" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Jeans</h3>
                                <span class="text-dark">Fashion</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                            <img src="assets/images/fashion/category/4.jpg" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Jacket</h3>
                                <span class="text-dark">Fashion</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                            <img src="assets/images/fashion/category/3.jpg" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Jeans</h3>
                                <span class="text-dark">Fashion</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- category section end -->


<section class="product-slider overflow-hidden">
    <div>
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="title-3 pb-4 title-border">
                        <h2>New Trends</h2>
                        <h5 class="theme-color">Our Collection (Clothes)</h5>
                    </div>
                
                    <div class="product-slider round-arrow">
                        <div>
                            <div class="row g-3">
                                @foreach ($latestProducts as $product)
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <div class="product-image">
                                            <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                                <img src="{{ asset('storage/'. $product->image) }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                            <div class="product-details">
                                                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                                    <h6 class="font-light">{{ $product->short_description }}</h6>
                                                    <h3>{{ $product->name }}</h3>
                                                    <h4 class="font-light mt-1"><del>${{ $product->sale_price }}</del> <span
                                                            class="theme-color">${{ $product->regular_price }}</span>
                                                    </h4>
                                                    <div class="cart-wrap">
                                                        <ul>
                                                            
                
                                                            <li>
                                                                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="icon">
                                                                    <i class="fas fa-eye"></i>
                                                                </a> 
                                                            </li>
                
                                                            <li>
                                                                <a href="javascript:void(0)" onclick="addProductToWishlist({{$product->id}},'{{$product->name}}' ,1,{{$product->regular_price}})" class="wishlist">
                                                                    <i data-feather="heart"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="title-3 pb-4 title-border">
                        <h2>New Trends</h2>
                        <h5 class="theme-color">Our Collection (Electronics)</h5>
                    </div>
                
                    <div class="product-slider round-arrow">
                        <div>
                            <div class="row g-3">
                                @foreach ($latestElectronics as $product)
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <div class="product-image">
                                            <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                                <img src="{{ asset('storage/'. $product->image) }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                            <div class="product-details">
                                                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                                    <h6 class="font-light">{{ $product->short_description }}</h6>
                                                    <h3>{{ $product->name }}</h3>
                                                    <h4 class="font-light mt-1"><del>${{ $product->sale_price }}</del> <span
                                                            class="theme-color">${{ $product->regular_price }}</span>
                                                    </h4>
                                                    <div class="cart-wrap">
                                                        <ul>
                                                            
                                                            <li>
                                                                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="icon">
                                                                    <i class="fas fa-eye"></i>
                                                                </a> 
                                                            </li>
                
                                                            <li>
                                                                <a href="javascript:void(0)" onclick="addProductToWishlist({{$product->id}},'{{$product->name}}' ,1,{{$product->regular_price}})" class="wishlist">
                                                                    <i data-feather="heart"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</section>
<style>
    .products-c .bg-size {
        background-position: center 0 !important;
    }
</style>

<section class="ratio_asos overflow-hidden pb-5">
    <div class="px-0 container-fluid p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2> Top Price 
                    </h2>
                </div>
            </div>


            <div class="our-product products-c">
                @foreach ($highSalePriceProducts as $product)
                <div>
                    <div class="product-box">
                        <div class="img-wrapper">
                            <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                <img src="{{ asset('storage/'. $product->image) }}"
                                    class="w-100 bg-img blur-up lazyload" alt="{{ $product->name }}">
                            </a>
                            <div class="circle-shape"></div>
                            <span class="background-text">{{ $product->category ?? 'Fashion' }}</span>
                            
                            <div class="cart-wrap">
                                <ul>
                                    
                                    <li>
                                        <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="icon">
                                            <i class="fas fa-eye"></i>
                                        </a> 
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="addProductToWishlist({{$product->id}},'{{$product->name}}' ,1,{{$product->regular_price}})" class="wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-style-3 product-style-chair">
                            <div class="product-title d-block mb-0">
                                <div class="r-price">
                                    <div class="theme-color">${{ $product->sale_price }}</div>
                                    <div class="main-price">
                                        <ul class="rating mb-1 mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="font-light mb-sm-2 mb-0">{{ $product->short_description }}</p>
                                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="font-default">
                                    <h5>{{ $product->name }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
    </div>
</section>


@push('scripts')
      <script>
            
        function addProductToWishlist(id,name,quantity,price)
        {
            $.ajax({
                type:'POST',
                url:"{{route('wishlist.store')}}",
                data:{
                    "_token":"{{ csrf_token() }}",
                    id:id,
                    name:name,
                    quantity:quantity,
                    price:price
                },
                success:function(data){
                    if(data.status == 200)
                    {
                        getCartWishlistCount();
                        $.notify({
                            icon:'fa fa-check',
                            title:"Success!",
                            message:"item successfully added to your wishlist!"
                        });
                    }
                }
            });
        }
        function getCartWishlistCount()
        {
            $.ajax({
                type:'GET',
                url:"{{route('shop.cart.wishlist.count')}}",
                success:function(data){
                    if(data.status==200)
                    {
                        $("#cart-count").html(data.cartCount);
                        $("#wishlist-count").html(data.wishlistCount);
                    }
                }
            })
        }

      </script>
@endpush
@endsection