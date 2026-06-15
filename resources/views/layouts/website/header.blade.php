<div class="spotlight" id="spotlight" aria-hidden="true"></div>
<nav id="main-nav" role="navigation" aria-label="Main navigation">
    <div class="container">
        <div class="nav-inner">
            @php
                $headerLogo = trim($home_page_data['header_logo'] ?? '');
            @endphp
            <a href="{{ route('index') }}" class="nav-logo" aria-label="Hytrak Rail Corporation — Home">
                @if ($headerLogo !== '')
                    <img
                        src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_logo'] }}"
                        alt="Hytrak Rail Corporation"
                        class="nav-logo-img"
                        width="548"
                        height="80"
                    />
                @else
                    <img
                        src="{{ asset('assets/website/images/hytrak-logo-white.png') }}"
                        alt="Hytrak Rail Corporation"
                        class="nav-logo-img"
                        width="148"
                        height="38"
                    />
                @endif
            </a>

            <ul class="nav-links" role="list">
                <li><a href="{{ route('index') }}" @if(request()->routeIs('index')) aria-current="page" @endif>Home</a></li>
                <li><a href="{{ route('index') }}#how-it-works">Technology</a></li>
                <li><a href="{{ route('index') }}#about">About</a></li>
                <li><a href="{{ route('index') }}#prototype">Projects</a></li>
                <li><a href="{{ route('index') }}#news">News</a></li>
                <li><a href="{{ route('index') }}#quick-contact">Contact</a></li>
                <li><a href="{{ route('index') }}#cta-banner" class="nav-cta" aria-label="Book a Demo or Get Involved">Book a Demo</a></li>
            </ul>

            <button class="hamburger" id="hamburger-btn" aria-label="Open navigation menu" aria-expanded="false" aria-controls="mobile-menu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
        </div>
    </div>
</nav>
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="Mobile navigation">
    <a href="{{ route('index') }}">Home</a>
    <a href="{{ route('index') }}#how-it-works">Technology</a>
    <a href="{{ route('index') }}#about">About</a>
    <a href="{{ route('index') }}#prototype">Projects</a>
    <a href="{{ route('index') }}#news">News</a>
    <a href="{{ route('index') }}#quick-contact">Contact</a>
    <a href="{{ route('index') }}#cta-banner" class="mobile-menu-cta">Book a Demo</a>
</div>
