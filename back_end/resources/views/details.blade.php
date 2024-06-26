@extends('layouts.base')
@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/css/demo2.css')}}">

    
            
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
                <h3>{{$product->name}}</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section> <!-- Shop Section start -->

<section>
    <div class="container">
        <div class="row gx-4 gy-5"><div class="col-lg-12 col-12">
            <div class="details-items">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="details-image-vertical black-slide rounded">
                                    {{-- All Product Images --}}
                                    @foreach ($productImages as $image)
                                        <div>
                                            <img src="{{ asset('storage/'.$image->image) }}" class="img-fluid blur-up lazyload" alt="{{ $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="details-image-1 ratio_asos">
                                    {{-- Main Image Zoom --}}
                                    <div>
                                        <img src="{{ asset('storage/'.$productImages->first()->image) }}" class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="{{ $product->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-6">
                        <div class="cloth-details-size">
                            <div class="product-count">
                                <ul>
                                    <li>
                                        <img src="../assets/images/gif/fire.gif" class="img-fluid blur-up lazyload" alt="image">
                                        <span class="p-counter">37</span>
                                        <span class="lang">orders in last 24 hours</span>
                                    </li>
                                    <li>
                                        <img src="../assets/images/gif/person.gif" class="img-fluid user_img blur-up lazyload" alt="image">
                                        <span class="p-counter">44</span>
                                        <span class="lang">active view this</span>
                                    </li>
                                </ul>
                            </div>
        
                            <div class="details-image-concept">
                                <h2>{{ $product->name }}</h2>
                            </div>
        
                            <div class="label-section">
                                <span class="badge badge-grey-color">#1 Best seller</span>
                                <span class="label-text">in fashion</span>
                            </div>
        
                            <h3 class="price-detail">
                                @if($product->sale_price)
                                    ${{ $product->sale_price }}
                                    <del>${{ $product->regular_price }}</del>
                                    <span>
                                        {{ round((($product->regular_price - $product->sale_price)/$product->regular_price)*100) }}% off
                                    </span>
                                @else
                                    {{ $product->regular_price }}
                                @endif
                            </h3>
        
                            <div class="product-buttons">
                                <a href="javascript:void(0)" class="btn btn-solid" id="triggerModal">
                                    <i class="fa fa-bookmark fz-16 me-2"></i>
                                    <span>Commande</span>
                                </a>
                                <script>
                                    document.getElementById('triggerModal').addEventListener('click', function() {
                                        var phoneNumber = "{{ $phoneNumber }}"; 
                                        Swal.fire({
                                            title: "<strong>Attention!!</strong>",
                                            icon: "info",
                                            html: `
                                            Il ne faut jamais envoyer de l’argent à l’avance au vendeur par virement bancaire ou à travers une agence de transfert d’argent lors de l’achat des biens disponibles sur le site.<br><br>
                                            <strong>Numéro de contact :</strong> ` + phoneNumber + `
                                            `,
                                            showCloseButton: true,
                                            showCancelButton: true,
                                            focusConfirm: false,
                                            confirmButtonText: '<i class="fa fa-thumbs-up"></i> D\'accord!',
                                            confirmButtonAriaLabel: "D'accord",
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                                            cancelButtonAriaLabel: "Thumbs down",
                                        });
                                    });
                                </script>
                            </div>
        
                            <ul class="product-count shipping-order">
                                <li>
                                    <img src="../assets/images/gif/truck.png" class="img-fluid blur-up lazyload" alt="image">
                                    <span class="lang">Free shipping for orders above $75 USD</span>
                                </li>
                            </ul>
        
                            <div class="mt-2 mt-md-3 border-product">
                                <h6 class="product-title hurry-title d-block">
                                    @if($product->stock_status=='instock')
                                        InStock
                                    @else
                                        Out Of Stock
                                    @endif
                                </h6>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 78%"></div>
                                </div>
                                <div class="font-light timer-5">
                                    <h5>Order in the next to get</h5>
                                    <ul class="timer1">
                                        <li class="counter">
                                            <h5 id="days">␣</h5> Days :
                                        </li>
                                        <li class="counter">
                                            <h5 id="hours">␣</h5> Hour :
                                        </li>
                                        <li class="counter">
                                            <h5 id="minutes">␣</h5> Min :
                                        </li>
                                        <li class="counter">
                                            <h5 id="seconds">␣</h5> Sec
                                        </li>
                                    </ul>
                                </div>
                            </div>
        
                            <div class="border-product">
                                <h6 class="product-title d-block">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li>
                                            <a href="https://www.facebook.com/">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.google.com/">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="pe-0">
                                            <a href="https://www.google.com/">
                                                <i class="fas fa-rss"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

            <div class="col-12">
                <div class="cloth-review">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#desc" type="button">Description</button>

                            <button class="nav-link" id="nav-speci-tab" data-bs-toggle="tab" data-bs-target="#speci"
                                type="button">Specifications</button>

                            <button class="nav-link" id="nav-size-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-guide" type="button">Sizing Guide</button>

                            <button class="nav-link" id="nav-question-tab" data-bs-toggle="tab"
                                data-bs-target="#question" type="button">Q & A</button>

                            {{-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#reviews" type="button">Review</button> --}}
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="desc">
                            <div class="shipping-chart">
                                {{$product->description}}
                            </div>
                        </div>

                        <div class="tab-pane fade" id="speci">
                            <div class="pro mb-4">
                                <p class="font-light">The Model is wearing a white blouse from our stylist's
                                    collection, see the image for a mock-up of what the actual blouse would look
                                    like.it has text written on it in a black cursive language which looks great
                                    on a white color.</p>
                                <div class="table-responsive">
                                    <table class="table table-part">
                                        @foreach($specification_products as $specification)
                                            <tr>
                                                <th>{{ $specification->attribute }}</th>
                                                <td>{{ $specification->value }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade overflow-auto" id="nav-guide">
                            <div class="table-responsive">
                                <table class="table table-pane mb-0">
                                    <tbody>
                                        <tr class="bg-color">
                                            <th class="my-2">US Sizes</th>
                                            <td>6</td>
                                            <td>6.5</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>8.5</td>
                                            <td>9</td>
                                            <td>9.5</td>
                                            <td>10</td>
                                            <td>10.5</td>
                                            <td>11</td>
                                        </tr>

                                        <tr>
                                            <th>Euro Sizes</th>
                                            <td>39</td>
                                            <td>39</td>
                                            <td>40</td>
                                            <td>40-41</td>
                                            <td>41</td>
                                            <td>41-42</td>
                                            <td>42</td>
                                            <td>42-43</td>
                                            <td>43</td>
                                            <td>43-44</td>
                                        </tr>

                                        <tr class="bg-color">
                                            <th>UK Sizes</th>
                                            <td>5.5</td>
                                            <td>6</td>
                                            <td>6.5</td>
                                            <td>7</td>
                                            <td>7.5</td>
                                            <td>8</td>
                                            <td>8.5</td>
                                            <td>9</td>
                                            <td>10.5</td>
                                            <td>11</td>
                                        </tr>

                                        <tr>
                                            <th>Inches</th>
                                            <td>9.25"</td>
                                            <td>9.5"</td>
                                            <td>9.625"</td>
                                            <td>9.75"</td>
                                            <td>9.9735"</td>
                                            <td>10.125"</td>
                                            <td>10.25"</td>
                                            <td>10.5"</td>
                                            <td>10.765"</td>
                                            <td>10.85</td>
                                        </tr>

                                        <tr class="bg-color">
                                            <th>CM</th>
                                            <td>23.5</td>
                                            <td>24.1</td>
                                            <td>24.4</td>
                                            <td>25.4</td>
                                            <td>25.7</td>
                                            <td>26</td>
                                            <td>26.7</td>
                                            <td>27</td>
                                            <td>27.3</td>
                                            <td>27.5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="question">
                            <div class="question-answer">
                                <ul>
                                    <li>
                                        <div class="que">
                                            <i class="fas fa-question"></i>
                                            <div class="que-details">
                                                <h6>Is it compatible with all WordPress themes?</h6>
                                                <p class="font-light">If you want to see a demonstration version of
                                                    the premium plugin, you can see that in this page. If you want
                                                    to see a demonstration version of the premium plugin, you can
                                                    see that in this page. If you want to see a demonstration
                                                    version of the premium plugin, you can see that in this page.
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="que">
                                            <i class="fas fa-question"></i>
                                            <div class="que-details">
                                                <h6>How can I try the full-featured plugin? </h6>
                                                <p class="font-light">Compatibility with all themes is impossible,
                                                    because they are too many, but generally if themes are developed
                                                    according to WordPress and WooCommerce guidelines, YITH plugins
                                                    are compatible with them. Compatibility with all themes is
                                                    impossible, because they are too many, but generally if themes
                                                    are developed according to WordPress and WooCommerce guidelines,
                                                    YITH plugins are compatible with them.</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="que">
                                            <i class="fas fa-question"></i>
                                            <div class="que-details">
                                                <h6>Is it compatible with all WordPress themes?</h6>
                                                <p class="font-light">If you want to see a demonstration version of
                                                    the premium plugin, you can see that in this page. If you want
                                                    to see a demonstration version of the premium plugin, you can
                                                    see that in this page. If you want to see a demonstration
                                                    version of the premium plugin, you can see that in this page.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="col-md-8">
                                <div class="row">
                                    <form action="{{route('saveRating',$product->id)}}" name="productRatingForm" method="POST" id="productRatingForm">
                                        
                                        <h3 class="h4 pb-3">Write a Review</h3>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                            <p></p>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                            <p></p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="rating">Rating</label>
                                            <br>
                                            <div class="rating-bourhan" style="width: 10rem">
                                                <input id="rating-5" type="radio" name="rating" value="5"/><label for="rating-5"><i class="fas fa-3x fa-star"></i></label>
                                                <input id="rating-4" type="radio" name="rating" value="4"/><label for="rating-4"><i class="fas fa-3x fa-star"></i></label>
                                                <input id="rating-3" type="radio" name="rating" value="3"/><label for="rating-3"><i class="fas fa-3x fa-star"></i></label>
                                                <input id="rating-2" type="radio" name="rating" value="2"/><label for="rating-2"><i class="fas fa-3x fa-star"></i></label>
                                                <input id="rating-1" type="radio" name="rating" value="1"/><label for="rating-1"><i class="fas fa-3x fa-star"></i></label>
                                            </div>
                                            <p class="product-rating-error"></p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">How was your overall experience?</label>
                                            <textarea name="comment"  id="comment" class="form-control" cols="30" rows="10" placeholder="How was your overall experience?"></textarea>
                                            <p></p>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-dark">Submit</button>
                                        </div>

                                    </form>
                                
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                               
                                <div class="rating-group mb-4">
                                   <span> <strong>Mohit Singh </strong></span>
                                    <div class="star-rating mt-2" title="70%">
                                        <div class="back-stars">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            
                                           
                                        </div>
                                    </div>   
                                    <div class="my-3">
                                        <p>I went with the blue model for my new apartment and an very pleased with the purchase. I'm definitely someone not used to paying this much for furniture, and I am also anxious about buying online, but I am very happy with the quality of this couch. For me, it is the perfect mix of cushy firmness, and it arrived defect free. It really is well made and hopefully will be my main couch for a long time. I paid for the extra delivery & box removal, and had an excellent experience as well. I do tend move my own furniture, but with an online purchase this expensive, that helped relieved my anxiety about having a item this big open up in my space without issues. If you need a functional sectional couch and like the feel of leather, this really is a great choice.

                                    </p>
                                    </div>
                                </div>

                                <div class="rating-group mb-4">
                                    <span class="author"><strong>Mohit Singh </strong></span>
                                    <div class="star-rating mt-2" >
                                        <div class="back-stars">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            
                                           
                                        </div>
                                    </div>   
                                    <div class="my-3">
                                        <p>I went with the blue model for my new apartment and an very pleased with the purchase. I'm definitely someone not used to paying this much for furniture, and I am also anxious about buying online, but I am very happy with the quality of this couch. For me, it is the perfect mix of cushy firmness, and it arrived defect free. It really is well made and hopefully will be my main couch for a long time. I paid for the extra delivery & box removal, and had an excellent experience as well. I do tend move my own furniture, but with an online purchase this expensive, that helped relieved my anxiety about having a item this big open up in my space without issues. If you need a functional sectional couch and like the feel of leather, this really is a great choice.

                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section end -->

<!-- product section start -->
<section class="ratio_asos section-b-space overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-lg-4 mb-3">Customers Also Bought These</h2>
                <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">
                    @foreach ($rproducts as $rproduct)
                                            
                    <div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="{{route('shop.product.details',['slug'=>$rproduct->slug])}}">
                                        <img src=" {{ asset('storage/'.$rproduct->image) }}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="{{route('shop.product.details',['slug'=>$rproduct->slug])}}">
                                        <img src=" {{ asset('storage/'.$rproduct->image) }}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="cart-wrap">
                                    <ul>
                                       
                                        <li>
                                            <a href="{{route('shop.product.details',['slug'=>$rproduct->slug])}}" class="icon">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="rating-details">
                                    <span class="font-light grid-content">Cupiditate Minus</span>
                                    
                                </div>
                                <div class="main-price">
                                    <a href="{{route('shop.product.details',['slug'=>$rproduct->slug])}}" class="font-default">
                                        <h5>{{$rproduct->name}}</h5>
                                    </a>
                                    <div class="listing-content">
                                        <span class="font-light">{{$rproduct->category->name}}</span>
                                        <p class="font-light">{{$rproduct->short_description}}</p>
                                    </div>
                                    <h3 class="theme-color">@if($rproduct->sale_price) {{ $product->sale_price }} @else {{$rproduct->regular_price}} @endif</h3>
                                    <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                        To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->
@endsection

{{-- <script type="text/javascript">
    $("#productRatingForm").submit(function(event){
        event.preventDefault();

        $.ajax({
            url : '{{ route("saveRating",$product->id) }}',
            type: 'POST',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
                var errors = response.errors;


               if(response.status == false) {
                if(errors.name) {
                        $("#name").addClass("is-invalid")
                        .siblings("p")
                        .addClass('invalid-feedback')
                        .html(errors.name);
                    }else{
                        $("#name").removeClass("is-invalid")
                        .siblings("p")
                        .removeClass('invalid-feedback')
                        .html('');
                    }


                    if(errors.email) {
                        $("#email").addClass("is-invalid")
                        .siblings("p")
                        .addClass('invalid-feedback')
                        .html(errors.email);
                    }else{
                        $("#email").removeClass("is-invalid")
                        .siblings("p")
                        .removeClass('invalid-feedback')
                        .html('');
                    }

                    if(errors.comment) {
                        $("#comment").addClass("is-invalid")
                        .siblings("p")
                        .addClass('invalid-feedback')
                        .html(errors.comment);
                    }else{
                        $("#comment").removeClass("is-invalid")
                        .siblings("p")
                        .removeClass('invalid-feedback')
                        .html('');
                    }

                    if(errors.rating) {
                        $(".product-rating-error").html(errors.rating);
                    }else{
                        $(".product-rating-error").html('');
                    } 
               } else {

               }
            }
        })
    });
</script> --}}