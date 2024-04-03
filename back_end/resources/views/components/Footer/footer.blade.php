<footer class="footer-sm-space mt-5">
    <div class="main-footer">
        <div class="container">
            <div class="row gy-4">
                <x-Footer.footer-contact/>

                
                @include('components.footer-links', ['title' => 'About us', 'links' => [
                    ['url' => route('app.index'), 'title' => 'Home'],
                    ['url' => 'shop.html', 'title' => 'Shop'],
                ]])
                
                @include('components.footer-links', ['title' => 'New Categories', 'links' => [
                    ['url' => 'shop.html', 'title' => 'Latest Shoes'],
                ]])
                
                @include('components.footer-links', ['title' => 'Get Help', 'links' => [
                    ['url' => '#', 'title' => 'Your Orders'],
                ]])
                
                <x-Footer.footer-newsletter/>
            </div>
        </div>
    </div>
    <x-Footer.sub-footer/>
</footer>