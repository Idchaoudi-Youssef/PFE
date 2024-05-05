
<li class="onhover-dropdown">
    <div class="cart-media name-usr">
        @auth
            <span>{{ Auth::user()->name }}</span> 
        @endauth
        <i data-feather="user"></i>
    </div>
    <div class="onhover-div profile-dropdown">
        <ul>
            @auth
                @if(Auth::user()->utype === 'ADM')
                    <li>
                        <a href="{{ route('admin.index') }}" class="d-block">Dashboard</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('dashboard.verify') }}" class="d-block">My Account</a>
                    </li>
                @endif
                @if(!Auth::user()->email_verified_at && Auth::user()->utype === 'USR')
                    
                    <li>
                        <a href="{{ route('verification.notice') }}" class="d-block" onclick="showVerificationAlert()">Verify Email</a>
                    </li>
                @endif
                <script>
                    function showVerificationAlert() {
                        alert('A verification email has been sent to your email address.');
                    }
                </script>
                @if(session('error'))
                    
                    <script>
                        alert('{{ session('error') }}');
                    </script>
                @endif
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frmlogout').submit();" class="d-block">Logout</a>
                    <form id="frmlogout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                @if(Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}" class="d-block">Login</a>
                    </li>
                @endif
                @if(Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}" class="d-block">Register</a>
                    </li>
                @endif
            @endauth
        </ul>
    </div>
    
</li>
