@extends('layouts.base')
@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo2.css">
@endpush 
@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Shop</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            

            <div class="category-product col-lg-9 col-12 ratio_30">

                <div class="row g-4">
                    <!-- label and featured section -->
                    <div class="col-md-12">
                        <ul class="short-name">


                        </ul>
                    </div>

                    <div class="col-12">
                        <div class="filter-options">
                            
                            <div class="grid-options d-sm-inline-block d-none">
                                <ul class="d-flex">
                                    <li class="two-grid">
                                        <a href="javascript:void(0)">
                                            <img src="assets/svg/grid-2.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="three-grid d-md-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="assets/svg/grid-3.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="grid-btn active d-lg-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="assets/svg/grid.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="list-btn">
                                        <a href="javascript:void(0)">
                                            <img src="assets/svg/list.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- label and featured section -->

                <!-- Prodcut setion -->
                
    <div class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
        @foreach ($products as $product)                            
        
    <div>
        <div class="product-box">
            <div class="img-wrapper">
                <div class="front">
                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                        <img src=" {{ asset('storage/'.$product->image) }}"
                            class="bg-img blur-up lazyload" alt="">
                    </a>
                </div>
                
                <div class="cart-wrap">
                    <ul>
                        <li>
                            <a href="javascript:void(0)" >
                                <i data-feather="eye"></i>
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
            <div class="product-details">
                <div class="rating-details">
                    <span class="font-light grid-content">{{$product->category->name}}</span>
                    
                </div>
                <div class="main-price">
                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="font-default">
                        <h5 class="ms-0">{{$product->name}}</h5>
                    </a>
                    <div class="listing-content">
                        <span class="font-light">{{$product->category->name}}</span>
                        <p class="font-light">{{$product->short_description}}</p>
                    </div>
                    <h3 class="theme-color">${{$product->regular_price}}</h3>
                    <form action="{{route('shop.product.details',['slug'=>$product->slug])}}" method="GET">
                        @csrf
                        <button type="submit" class="btn listing-content">View Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        @endforeach
    </div>
    
    {{$products->links("pagination.default")}}


               

            </div>
        </div>
    </div>
</section>



<form id="frmFilter" method="GET">
    <input type="hidden" name="page" id="page" value="{{$page}}" />
    <input type="hidden" name="size" id="size" value="{{$size}}" />      
    <input type="hidden" id="order" name="order" value="{{$order}}" /> 
 
</form>

@push('scripts')
      <script>
            $("#pagesize").on("change",function(){                    
                  $("#size").val($("#pagesize option:selected").val());
                  $("#frmFilter").submit(); 
            });
            
            $("#orderby").on("change",function(){                    
            $("#order").val($("#orderby option:selected").val());
            $("#frmFilter").submit(); 
            });
            
            

            $(function(){            
            $("#orderby").on("change",function(){
                $("#order").val($("#orderby option:selected").val());
                $("#frmFilter").submit();
            });           
        });


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