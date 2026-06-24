<footer class="site-footer" role="contentinfo" aria-label="Hytrak Rail Corporation Footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-brand-block">
                <a href="{{ route('index') }}" class="footer-logo" aria-label="Hytrak Rail — Home">
                    
                    <img
                        src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_logo'] }}"
                        alt="Hytrak Rail Corporation"
                        class="footer-logo-img"
                        width="350"
                        height="55"
                    />
                </a>
                <p class="footer-tagline">Private cars. 250 mph. Zero emissions. Elevated high-speed rail — built and proven in Lake County, California.</p>
                <div class="footer-contact-pills">
                    <span>Lakeport, CA 95453</span>
                    <span>Patented Technology</span>
                </div>
                <div class="footer-social" aria-label="Hytrak social media links">
                    <a href="https://www.linkedin.com/company/hytrak-rail-corporation" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <a href="https://www.facebook.com/hytrak" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <a href="https://www.youtube.com/watch?v=7l1qtFoPwaA" aria-label="YouTube" target="_blank" rel="noopener noreferrer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.95C18.88 4 12 4 12 4s-6.88 0-8.59.47A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.41 19c1.71.47 8.59.47 8.59.47s6.88 0 8.59-.47a2.78 2.78 0 0 0 1.95-1.95 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="#010816"/></svg>
                    </a>
                </div>
            </div>

            <div class="footer-links-grid">
                <nav class="footer-col" aria-label="Explore Hytrak">
                    <h5>Explore</h5>
                    <ul>
                        <li><a href="{{ route('index') }}#how-it-works">How It Works</a></li>
                        <li><a href="{{ route('index') }}#benefits">Key Benefits</a></li>
                        <li><a href="{{ route('index') }}#tech-teaser">Technology</a></li>
                        <li><a href="{{ route('index') }}#prototype">Prototype & Progress</a></li>
                        <li><a href="{{ route('index') }}#comparison">Hytrak vs. the Field</a></li>
                    </ul>
                </nav>
                <nav class="footer-col" aria-label="Company">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="{{ route('index') }}#about">About Hytrak</a></li>
                        <li><a href="{{ route('index') }}#team">Leadership Team</a></li>
                        <li><a href="{{ route('index') }}#services">Our Services</a></li>
                        <li><a href="{{ route('index') }}#news">News & Media</a></li>
                    </ul>
                </nav>
                <nav class="footer-col" aria-label="Get involved">
                    <h5>Get Involved</h5>
                    <ul>
                        <li><a href="{{ route('index') }}#cta-banner">Book a Demo</a></li>
                        <li><a href="{{ route('index') }}#quick-contact">Investor Inquiry</a></li>
                        <li><a href="{{ route('index') }}#quick-contact">Partnership</a></li>
                        <li><a href="{{ route('index') }}#quick-contact">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="footer-newsletter-bar">
            <div class="footer-newsletter-copy">
                <h4>Stay in the loop</h4>
                <p>Hytrak milestones, pilot updates, and investment news — straight to your inbox.</p>
            </div>
            <form class="newsletter-form" action="#" method="post" aria-label="Newsletter signup">
                @csrf
                <input type="email" name="email" placeholder="your@email.com" aria-label="Email address" autocomplete="email" required />
                <button type="submit">Subscribe</button>
            </form>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Hytrak Rail Corporation. All rights reserved.</p>
            <nav class="footer-bottom-links" aria-label="Legal links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Patents</a>
                <a href="{{ route('index') }}#quick-contact">Contact</a>
            </nav>
        </div>
    </div>
</footer>
