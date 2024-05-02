<header class="header-style-2" id="home">
    <div class="main-header navbar-searchbar">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-menu">
                        <x-Header.brand-logo/>
                        <x-Header.nav-menu/> 
                        <div class="menu-right">
                            <ul>
                                <x-Header.search-box/> 
                                <x-Header.wishlist-cart/> 
                                <x-Header.user-dropdown/> 
                            </ul>
                        </div>


                        <div class="search-full" >
                            <form method="GET" action="{{ route('search.products') }}">
                                <div class="input-group">

                                    <span class="input-group-text">
                                        <button type="submit" class="btn btn-light search-icon-open">
                                            <i data-feather="search" class="font-light"></i>
                                        </button>
                                    </span>

                                    <input type="text" name="q" class="form-control search-type" placeholder="Search here..">

                                    <span class="input-group-text">
                                        <!-- Bouton pour fermer la recherche -->
                                        <button type="button" class="btn btn-light close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>