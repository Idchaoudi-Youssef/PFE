<div class="col-lg-2 col-md-4 col-sm-6">
    <div class="footer-links">
        <div class="footer-title">
            <h3>{{ $title }}</h3>
        </div>
        <div class="footer-content">
            <ul>
                @foreach ($links as $link)
                    <li>
                        <a href="{{ $link['url'] }}" class="font-dark">{{ $link['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>