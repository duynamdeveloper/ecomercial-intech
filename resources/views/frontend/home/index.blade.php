@extends('frontend.layouts.index')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('themes/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('themes/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('themes/styles/responsive.css') }}">
@endsection
@section('header')
    @include('frontend.layouts.header')
@endsection
@section('content')
    @include('frontend.home.partials.banner')
    @include('frontend.home.partials.characteristic')
    @include('frontend.home.partials.dealoftheweek')
    @include('frontend.home.partials.popular_categories')
    @include('frontend.home.partials.banner2')
    @include('frontend.home.partials.new_arrivals')
    @include('frontend.home.partials.advert')
    @include('frontend.home.partials.trends')
    @include('frontend.home.partials.review')
    

@endsection
@section('footer')
    @include('frontend.layouts.recently_view')
    @include('frontend.layouts.brands')
    @include('frontend.layouts.newsletter')
    @include('frontend.layouts.footer')
@endsection
@section('scripts')
<script src="{{ asset('themes/js/custom.js') }}"></script>
@endsection