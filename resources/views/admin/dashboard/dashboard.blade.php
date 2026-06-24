@extends('layouts.admin.app')
@section('title', $page_title ?? 'Dashboard')

@push('css')
    <style>
        .pg-dash {
            min-height: calc(100vh - 100px);
            background: linear-gradient(180deg, var(--admin-cream) 0%, var(--admin-cream-mid) 100%);
            padding: 0 1.5rem 2.5rem;
        }

        .pg-dash__banner {
            width: 100%;
            margin: 15px auto 2.5rem;
            padding: 3.5rem 2rem;
            background: #001f5b;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            isolation: isolate;
            border: 1px solid var(--admin-border);
        }

        .pg-dash__banner::before {
            content: '';
            position: absolute;
            inset: 0;
            z-index: 0;
            animation: pgDashMesh 18s ease-in-out infinite alternate;
            pointer-events: none;
            background:
                radial-gradient(ellipse 80% 55% at 75% 25%, rgba(0, 200, 255, 0.12) 0%, transparent 58%),
                radial-gradient(ellipse 55% 45% at 15% 85%, rgba(0, 31, 91, 0.06) 0%, transparent 52%);
        }

        @keyframes pgDashMesh {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(-10px, 12px) scale(1.02); }
        }

        .pg-dash__welcome {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .pg-dash__welcome-logo {
            width: min(100%, 50%);
            height: auto;
            margin: 0 auto 1.25rem;
            display: block;
        }

        .pg-dash__welcome-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 800;
            font-size: clamp(2rem, 5vw, 5rem);
            line-height: 1.05;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            margin: 0;
            background: linear-gradient(135deg, #001f5b 0%, #00c8ff 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: welcomeFloat 3s ease-in-out infinite;
        }

        @keyframes welcomeFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        .pg-dash__welcome-subtitle {
            font-size: clamp(0.875rem, 2vw, 1rem);
            font-weight: 600;
            margin: 1rem 0 0;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--admin-muted);
        }

        .pg-dash__grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .pg-dash__card {
            background: #fff;
            border-radius: 16px;
            padding: 1.75rem 1.5rem;
            text-decoration: none;
            color: inherit;
            display: block;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.35s ease, border-color 0.35s ease;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(24px);
            animation: cardFadeIn 0.55s ease forwards;
            border: 1px solid var(--admin-border);
        }

        .pg-dash__card:nth-child(1) { animation-delay: 0.08s; }
        .pg-dash__card:nth-child(2) { animation-delay: 0.15s; }
        .pg-dash__card:nth-child(3) { animation-delay: 0.22s; }
        .pg-dash__card:nth-child(4) { animation-delay: 0.29s; }

        @keyframes cardFadeIn {
            to { opacity: 1; transform: translateY(0); }
        }

        .pg-dash__card:hover {
            transform: translateY(-6px);
            color: inherit;
            text-decoration: none;
            border-color: rgba(0, 200, 255, 0.35);
            box-shadow: 0 16px 40px rgba(0, 13, 46, 0.12);
        }

        .pg-dash__card-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
            transition: transform 0.3s ease;
            color: #fff;
        }

        .pg-dash__card-icon.brand {
            background: linear-gradient(135deg, #001f5b 0%, #00c8ff 100%);
            box-shadow: 0 6px 18px rgba(0, 31, 91, 0.25);
        }

        .pg-dash__card:hover .pg-dash__card-icon {
            transform: scale(1.06);
        }

        .pg-dash__card-value {
            font-size: 2.35rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 0.5rem;
            color: var(--admin-text);
        }

        .pg-dash__card-label {
            font-size: 0.9375rem;
            margin-top: 0.25rem;
            font-weight: 600;
            color: var(--admin-muted);
        }

        @media (max-width: 1200px) {
            .pg-dash__grid { grid-template-columns: repeat(3, 1fr); }
        }

        @media (max-width: 992px) {
            .pg-dash__grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 576px) {
            .pg-dash { padding: 0 1rem 1.5rem; }
            .pg-dash__banner { padding: 2rem 1.25rem; margin-bottom: 1.5rem; }
            .pg-dash__grid { grid-template-columns: 1fr; gap: 1rem; }
            .pg-dash__card { padding: 1.25rem; }
            .pg-dash__card-value { font-size: 1.65rem; }
        }
    </style>
@endpush

@section('content')
    <section class="content pg-dash">
        @php
            $contactUsIndex = Route::has('contactus.index') ? route('contactus.index') : '#';
            $videoIndex = Route::has('video.index') ? route('video.index') : '#';
            $adminLogo = trim($home_page_data['header_logo'] ?? '');
        @endphp

        <div class="pg-dash__banner">
            <div class="pg-dash__welcome">
                 
                <img class="pg-dash__welcome-logo"
                width="240"
                height="60"
                src="{{ asset('public/admin/assets/images/page/' . $adminLogo) }}"
                alt="Hytrak Rail Corporation">
                <h1 class="pg-dash__welcome-title">Welcome to<br>Hytrak Rail</h1>
                <p class="pg-dash__welcome-subtitle">Admin Dashboard</p>
            </div>
        </div>

        <div class="pg-dash__grid">
            <a href="{{ $contactUsIndex }}" class="pg-dash__card">
                <div class="pg-dash__card-icon brand"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                <div class="pg-dash__card-value">{{ $contactUsTotal ?? 0 }}</div>
                <div class="pg-dash__card-label">Contact Messages</div>
            </a>

            <a href="{{ $videoIndex }}" class="pg-dash__card">
                <div class="pg-dash__card-icon brand"><i class="fa fa-video-camera" aria-hidden="true"></i></div>
                <div class="pg-dash__card-value">{{ $videoTotal ?? 0 }}</div>
                <div class="pg-dash__card-label">Videos</div>
            </a>
        </div>
    </section>
@endsection
