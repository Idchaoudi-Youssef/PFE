@extends("layouts.base")
@section("content")

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
                <h3>Rejected List</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Rejected List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section Start -->
<section class="wish-list-section section-b-space">
    <div class="container">
        @if($products->count() > 0)
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table cart-table wishlist-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col ">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)                                                    
                        <tr>
                            <td>
                                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                    <img src="{{ asset('storage/'. $product->image) }}"
                                        class=" blur-up lazyload" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="font-light">{{$product->name}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>In Stock</p>
                                    </div>
                                    <div class="col">
                                        <p class="fw-bold">${{$product->regular_price}}</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)" class="icon">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </h2>
                                        <h2 class="td-color">
                                            <a href="cart.php" class="icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-bold">${{$product->regular_price}}</p>
                            </td>
                            <td>
                                @if($product->stock_status == "instock")
                                    <p>In Stock</p>
                                @else
                                    <p>Stock Out</p>
                                @endif
                            </td>
                            
                            <td>
                                                                 
                                <a href="javascript:void(0)" class="icon">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr> 
                        @endforeach                          
                    </tbody>
                </table>
            </div>
        </div>

        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Your Waiting List is empty ! </h2>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection