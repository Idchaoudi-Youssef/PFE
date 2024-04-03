
    <li class="onhover-dropdown">
        <div class="cart-media name-usr">
            @auth <span>{{ Auth::user()->name }}</span> @endauth <i data-feather="user"></i>
        </div>
        <div class="onhover-div profile-dropdown">
            <ul>
                @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->utype === 'ADM')
                            <li>
                                <a href="{{route('admin.index')}}" class="d-block">Dashboard</a>
                            </li>
                        @else
                            <li>
                                <a href="{{route('user.index')}}" class="d-block">My Account</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('frmlogout').submit();" class="d-block">Logout</a>
                            <form id="frmlogout" action="{{route('logout')}}" method="POST">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{route('login')}}" class="d-block">Login</a>
                        </li>
                        <li>
                            <a href="{{route('register')}}" class="d-block">Register</a>
                        </li>
                    @endauth                                                    
                @endif
            </ul>
        </div>
    </li>
</li>