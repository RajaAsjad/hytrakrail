@extends('layouts.website.master')

@section('title', $page_title)
@section('meta_description', $meta_description)
@section('keywords', $meta_keywords ?? 'Hytrak Rail, high speed rail, elevated monorail, sustainable transportation, Mark Mitchell, private rail cars, zero emissions transit')
@section('og_title', 'Hytrak Rail Corporation — Get Places Faster!')
@section('og_description', 'Revolutionary elevated high-speed rail. Private cars. 250 mph. Zero emissions. Built for ~5% of conventional rail project cost.')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Organization",
  "name": "Hytrak Rail Corporation",
  "url": "{{ url('/') }}",
  "logo": "{{ url('/logo.png') }}",
  "foundingDate": "2019",
  "founder": { "@@type": "Person", "name": "Mark Mitchell" },
  "address": { "@@type": "PostalAddress", "addressLocality": "Lakeport", "addressRegion": "CA", "addressCountry": "US" },
  "description": "Revolutionary elevated high-speed rail system offering private 4-passenger pods at 250 mph with zero emissions and capital costs at roughly 5% of conventional rail projects.",
  "sameAs": ["https://www.linkedin.com/company/hytrak-rail-corporation"]
}
</script>
@endsection

@section('content')
@include('website.partials.home-sections')
@endsection
