<li class="onhover-dropdown wislist-dropdown">
    <div class="cart-media">
        <a href="{{route('wishlist.list')}}">
            <i data-feather="heart"></i>
            <span id="wishlist-count" class="label label-theme rounded-pill">
                {{Cart::instance('wishlist')->Content()->count()}}
            </span>
        </a>
    </div>
</li>
