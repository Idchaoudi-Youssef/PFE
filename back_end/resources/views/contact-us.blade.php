@extends('layouts.base')
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
                    <h3>Contact Us</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.htm">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section> <!-- Contact Section Start -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="materialContainer">
                        <div class="material-details">
                            <div class="title title1 title-effect mb-1 title-left">
                                <h2>Contact Us</h2>
                                <p class="ms-0 w-100">Your email address will not be published. Required fields are
                                    marked *</p>
                            </div>
                        </div>
                        <form action="{{route('contact.store')}}" method="POST" id="contactForm">
                            @csrf
                            <div class="row g-4 mt-md-1 mt-2">
                                <div class="col-md-6">
                                    <label for="first" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter Your First Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter Your Last Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required>
                                </div>
                                <div class="col-12">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea class="form-control" id="commentaire" name="commentaire" rows="5" required></textarea>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-solid-default" onclick="submitForm(event)">Submit</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    function submitForm(event) {
                        event.preventDefault(); 
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, send it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('contactForm').submit(); 
                            }
                        });
                    }
                </script>

                <div class="col-lg-5">
                    <div class="contact-details">
                        <div>
                            <h2>Let's get in touch</h2>
                            <h5 class="font-light">We're open for any suggestion or just to have a chat</h5>
                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="map-pin"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Address :</h4>
                                    <p> NIT, Faridabad, Rabat,
                                        Maroc</p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="phone"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Phone Number :</h4>
                                    <p>+212 6 21 58 69</p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="mail"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Email Address :</h4>
                                    <p>Shop@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


    <div class="modal fade newletter-modal" id="newsletter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <img src="assets/images/newletter-icon.png" class="img-fluid blur-up lazyload" alt="">
                    <div class="modal-title">
                        <h2 class="tt-title">Sign up for our Newsletter!</h2>
                        <p class="font-light">Never miss any new updates or products we reveal, stay up to date.</p>
                        <p class="font-light">Oh, and it's free!</p>

                        <div class="input-group mb-3">
                            <input placeholder="Email" class="form-control" type="text">
                        </div>

                        <div class="cancel-button text-center">
                            <button class="btn default-theme w-100" data-bs-dismiss="modal"
                                type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-label="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="modal-contain">
                        <div>
                            <div class="modal-messages">
                                <i class="fas fa-check"></i> 3-stripes full-zip hoodie successfully added to
                                you cart.
                            </div>
                            <div class="modal-product">
                                <div class="modal-contain-img">
                                    <img src="assets/images/fashion/instagram/4.jpg" class="img-fluid blur-up lazyload"
                                        alt="">
                                </div>
                                <div class="modal-contain-details">
                                    <h4>Premier Cropped Skinny Jean</h4>
                                    <p class="font-light my-2">Yellow, Qty : 3</p>
                                    <div class="product-total">
                                        <h5>TOTAL : <span>$1,140.00</span></h5>
                                    </div>
                                    <div class="shop-cart-button mt-3">
                                        <a href="shop-left-sidebar.php"
                                            class="btn default-light-theme conti-button default-theme default-theme-2 rounded">CONTINUE
                                            SHOPPING</a>
                                        <a href="cart.php"
                                            class="btn default-light-theme conti-button default-theme default-theme-2 rounded">VIEW
                                            CART</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ratio_asos mt-4">
                        <div class="container">
                            <div class="row m-0">
                                <div class="col-sm-12 p-0">
                                    <div
                                        class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space spacing-slider">
                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="details.php">
                                                            <img src="assets/images/fashion/product/front/1.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="details.php">
                                                            <img src="assets/images/fashion/product/front/2.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="details.php">
                                                            <img src="assets/images/fashion/product/front/3.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="details.php">
                                                            <img src="assets/images/fashion/product/front/4.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection