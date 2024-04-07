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
                <h3>Products</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>


<div class="col-sm-5 col-7">
    <div class="left-side-button float-start">
        <a href="{{route('products.create')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
            <i class="fas fa-arrow-left"></i> Add New products</a>
    </div>
</div>
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
                            <th scope="col ">Verified</th>
                            <th scope="col">availability</th>
                            <th scope="col">action</th>

                            
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
                                <form action="{{ route('admin.product.verify', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <select class="form-control" id="actionSelect" name="featured" style="padding: 10px 2px;" onchange="this.form.submit()">
                                            <option value="">Select</option>
                                            <option value="1" {{ $product->featured == '1' ? 'selected' : '' }}>Accepter</option>
                                            <option value="0" {{ $product->featured == '0' ? 'selected' : '' }}>Rejeter</option>
                                        </select>
                                    </div>
                                </form>
                                
                                  
                            </td>
                            <td>
                                @if($product->stock_status == "instock")
                                    <p>In Stock</p>
                                @else
                                    <p>Stock Out</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.editProduct', ['id' => $product->id]) }}" class="icon">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="icon" onclick="confirm('Are you sure?') && document.getElementById('delete-form-{{ $product->id }}').submit();">
                                    <i class="fas fa-times"></i>
                                </a>
                                <form id="delete-form-{{ $product->id }}" action="{{route('admin.deleteProduct', ['id' => $product->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                
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
                    <h2>Your wishlist is empty ! </h2>
                    <h5 class="mt-3">Add items to it now.</h5>
                    <a href="{{route('shop.index')}}" class="btn btn-warning mt-5">Shop Now</a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection