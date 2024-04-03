<nav>
    <div class="main-navbar">
        <div id="mainnav">
            <x-Header.partials.toggle-nav/> {{-- Suppose you have a toggle-nav.blade.php for mobile nav toggle --}}
            <ul class="nav-menu">

                <li class="back-btn d-xl-none">
                    <div class="close-btn">
                        Menu
                        <span class="mobile-back"><i class="fa fa-angle-left"></i>
                        </span>
                    </div>
                </li>
                <li><a href="{{route('app.index')}}" class="nav-link menu-title">Home</a></li>
                {{-- <li><a href="{{route('shop.index')}}" class="nav-link menu-title">Shop</a></li> --}}
                <li>
                        <a href="#" class="nav-link menu-title">Shop</a>
                        <!-- Sous-menu pour Shop -->
                        <ul class="submenu">
                            <li><a href="{{route('shop.index')}}" class="nav-link">Vêtements</a></li>
                            <li><a href="{{route('shop.informatique')}}" class="nav-link">Matériel Info</a></li>
                        </ul>
                </li>
                {{-- <li><a href="{{route('cart.index')}}" class="nav-link menu-title">Cart</a></li> --}}
                <li><a href="{{route('app.aboutus')}}" class="nav-link menu-title">About Us</a></li>
                <li><a href="{{route('app.contactus')}}" class="nav-link menu-title">Contact Us</a>
                </li>
                <li><a href="{{route('app.blog')}}" class="nav-link menu-title">Blog</a></li>


               

            </ul>
        </div>
    </div>
</nav>