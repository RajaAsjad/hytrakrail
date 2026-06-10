<div class="spotlight" id="spotlight" aria-hidden="true"></div>
<nav id="main-nav" role="navigation" aria-label="Main navigation">
    <div class="container">
        <div class="nav-inner">
            <a href="{{ route('index') }}" class="nav-logo" aria-label="Hytrak Rail Corporation — Home">
                <svg width="148" height="38" viewBox="0 0 148 38" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Hytrak Rail Corporation Logo" role="img">
                    <polygon points="0,19 14,4 14,12 22,12 22,6 36,19 22,32 22,26 14,26 14,34" fill="#C0392B"/>
                    <polygon points="4,19 16,7 16,14 24,14 24,8 34,19 24,30 24,24 16,24 16,31" fill="#003087" opacity="0.7"/>
                    <text x="44" y="26" font-family="Barlow Condensed, sans-serif" font-size="22" font-weight="900" fill="white" letter-spacing="2">HYTRAK</text>
                    <text x="44" y="35" font-family="Inter, sans-serif" font-size="8.5" font-weight="500" fill="#8a9bb8" letter-spacing="2.5">RAIL CORPORATION</text>
                </svg>
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
