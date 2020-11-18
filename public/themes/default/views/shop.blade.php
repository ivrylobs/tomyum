@extends('layouts.main')

@section('content')
    <!-- SHOP COVER IMAGE -->
    @include('banners.shop_cover', ['shop' => $shop])


    <!-- BROWSING ITEMS -->
{{--    @include('sliders.browsing_items')--}}

    <!-- MODALS -->
    @include('modals.shopReviews')

    {{--    <!-- CONTENT SECTION -->--}}
    @include('contents.shop_page', ['shop' => $shop])

@endsection