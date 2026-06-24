@extends('layouts.website.master')

@section('title', 'Carbon Impact & Sustainability — Hytrak Rail Corporation')
@section('meta_description', 'Hytrak Rail carbon impact analysis for the proposed Amazon Austin to San Antonio corridor. Zero operational emissions, ~95% less construction embodied carbon vs. conventional HSR.')
@section('keywords', 'Hytrak carbon savings, sustainable rail, Austin San Antonio corridor, zero emissions transit, environmental impact')
@section('og_title', 'Carbon Impact — Hytrak Rail Corporation')
@section('og_description', 'Preliminary corridor analysis: massive carbon savings with Hytrak elevated rail on the Austin–San Antonio route.')

@section('content')
<section class="section-pad page-hero" aria-labelledby="sustainability-heading">
    <div class="container">
        <div class="reveal" style="max-width:800px;">
            <div class="section-eyebrow">Sustainability</div>
            <h1 class="section-title" id="sustainability-heading">
                Carbon Impact<br />
                <span class="text-cyan">Analysis.</span>
            </h1>
            <p class="section-desc">
                Hytrak delivers zero operational carbon emissions and a dramatically smaller construction footprint than conventional high-speed rail. This page summarizes our preliminary engineering analysis for the proposed <strong>Amazon · Austin to San Antonio</strong> corridor.
            </p>
        </div>
    </div>
</section>

<section class="section-pad carbon-impact carbon-impact--page" aria-labelledby="corridor-study-heading">
    <div class="container">
        <div class="carbon-impact__detail reveal">
            <div class="carbon-impact__detail-inner">
                <h2 id="corridor-study-heading">Corridor Overview</h2>
                <p>
                    The Austin–San Antonio corridor spans approximately 82 miles along the I-35 technology and logistics corridor — one of the fastest-growing regions in the United States. Amazon and other major employers have expanded operations across both metros, intensifying demand for fast, reliable intercity travel without adding highway capacity.
                </p>
                <p>
                    A Hytrak elevated network on this route would connect hub-to-hub in under 25 minutes at 250&nbsp;mph using private 4-passenger pods — non-stop, on-demand, and fully electric.
                </p>
            </div>
        </div>

        <div class="carbon-impact__grid" style="margin-top:48px;">
            <div class="carbon-stat-card reveal">
                <div class="carbon-stat-card__num">~185K</div>
                <div class="carbon-stat-card__unit">tons CO₂/yr</div>
                <p>Projected annual emissions offset at 20,000 daily passengers vs. single-occupancy vehicle baseline</p>
            </div>
            <div class="carbon-stat-card reveal" style="transition-delay:0.06s;">
                <div class="carbon-stat-card__num">~704</div>
                <div class="carbon-stat-card__unit">MPG equiv.</div>
                <p>Per-passenger energy efficiency — outperforming auto, air, and traditional rail</p>
            </div>
            <div class="carbon-stat-card reveal" style="transition-delay:0.12s;">
                <div class="carbon-stat-card__num">~95%</div>
                <div class="carbon-stat-card__unit">less embodied</div>
                <p>Construction-phase embodied carbon vs. ground-level HSR on equivalent alignment</p>
            </div>
            <div class="carbon-stat-card reveal" style="transition-delay:0.18s;">
                <div class="carbon-stat-card__num">~5%</div>
                <div class="carbon-stat-card__unit">of HSR cost</div>
                <p>Capital cost — enabling faster deployment and earlier emissions benefits</p>
            </div>
        </div>

        <div class="carbon-impact__detail reveal" style="margin-top:48px;">
            <div class="carbon-impact__detail-inner">
                <h2>Operational Emissions</h2>
                <p>
                    Hytrak pods are fully electric. At scale, a corridor operating 20,000 passengers per day with an average trip length of 82 miles would displace millions of vehicle-miles annually. Using EPA passenger-vehicle emissions factors and conservative mode-shift assumptions, we estimate approximately <strong>185,000 metric tons of CO₂ equivalent avoided per year</strong> compared to travelers driving alone.
                </p>
                <ul class="carbon-impact__bullets" role="list">
                    <li>No tailpipe emissions during operation</li>
                    <li>Opportunity for renewable grid integration at hubs</li>
                    <li>Lightweight 3,000 lb pods (including passengers) minimize energy per trip</li>
                    <li>Aerodynamic drag coefficient of 0.03 — magnitude better than passenger vehicles</li>
                </ul>
            </div>
        </div>

        <div class="carbon-impact__detail reveal" style="margin-top:32px;">
            <div class="carbon-impact__detail-inner">
                <h2>Construction &amp; Land Impact</h2>
                <p>
                    Conventional high-speed rail requires extensive grading, tunneling, and land acquisition — generating enormous embodied carbon before a single passenger boards. Hytrak's slender elevated towers placed alongside existing highway and utility easements minimize earthworks, concrete volume, and habitat disruption.
                </p>
                <p>
                    Our preliminary estimate indicates approximately <strong>95% lower embodied carbon in civil works</strong> compared to a ground-level HSR alternative on the same Austin–San Antonio alignment, with land beneath the structure remaining largely usable.
                </p>
            </div>
        </div>

        <div class="carbon-impact__detail reveal" style="margin-top:32px;">
            <div class="carbon-impact__detail-inner">
                <h2>Methodology Notes</h2>
                <p>
                    Figures on this page represent preliminary engineering estimates prepared by Hytrak Rail Corporation. Ridership, grid carbon intensity, and mode-shift assumptions can be refined with corridor-specific feasibility studies. For partnership inquiries or detailed modeling data, please contact our team.
                </p>
                <a href="{{ route('index') }}#quick-contact" class="btn-primary" style="margin-top:20px;">
                    Request the Full Study
                </a>
                <a href="{{ route('index') }}" class="btn-ghost" style="margin-top:20px; margin-left:12px;">Back to Home</a>
            </div>
        </div>

        <p class="carbon-impact__disclaimer reveal" style="margin-top:40px;">* Preliminary analysis. Not a formal environmental impact report. Figures subject to revision as corridor studies progress.</p>
    </div>
</section>
@endsection
