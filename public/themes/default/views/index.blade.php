@extends('layouts.main')

@section('content')
    @if(isset($banners['best_deals']))
        <section>
            <div class="container-fluid">
                <div class="row">
                    @foreach($banners['best_deals'] as $banner)
                        {{--hard code for big first banner--}}
                        @if($banner['order'] === 888)
                            <img class="banner-img" src="{{ get_storage_file_url($banner['featured_image']['path'], 'full') }}" alt="{{ $banner['title'] or 'Banner Image' }}" title="{{ $banner['title'] or 'Banner Image' }}">
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- TRENDING ITEMS -->
    <section>
        <div class="bg-orange" style="background: linear-gradient(180deg,#ff0003 , #F7D121, #EAEAEA)">
            <div class="container">
                @include('sliders.main')
            </div>
        </div>

        <div class="container">
            <!-- MAIN SLIDER -->
            <!-- BEST DEALS BANNER -->
            @include('banners.best_deals')
            @include('sliders.carousel_with_feedback', ['products' => $trending])
            @include('apparel')
            @include('mom_and_baby')
            @include('accessories')
            @include('recommendation', ['products' => $recommendations])
            @include('video', ['videos' => $videos])
            <div class="space50"></div>
            <div class="space50"></div>
        </div><!-- /.container -->
    </section>

    <style>
        @media (min-width: 1200px) {
            .container {
                width: 95%;
            }
        }
        .section-title {
            margin: 0;
            margin-top: 10px;
        }

        /*can remove*/
        .detail-inner {
            position: absolute;
            bottom: 7%;
            right: 7%;
            border: 1px solid #E1E1E8;
            padding: 0 15px;
            color: #ffffff;
            background-color: #ff0004;
            border-radius: 0;
        }

        .product-carousel .product-widget, .new-arrival-carousel .product-widget {
            border: none;
            background: #fff;
            min-height: auto;
            -webkit-box-shadow: 0 0 10px #eee;
            box-shadow: 0 0 10px #eee;
            margin: 5px;
        }

        .img-responsive {
            width: 100%
        }

        #content-wrapper {
            background: #EAEAEA;
        }
        .section-heading {
            font-weight: bold;
            color: #ff0003;
        }
        .product-info-title {
            color: #ff0003;
        }
        .product-widget .product-info {
            padding: 15px;
        }
        .show-more {
            margin-top: 20px;
        }
        .show-more a {
            color: #6e6e6e;
        }

        .show-more a:hover {
            text-decoration: none;
        }

        .grey-text {
            color: #6e6e6e;
        }

        .border-heading-red {
            width: 100%;
            border-bottom: 3px solid #FF0002;
        }

        .border-heading-yellow {
            width: 100%;
            border-bottom: 3px solid #ffc76a;
        }

        .menu-category-dropdown > li > a:after {
            line-height: 44px;
        }

        .fa-angle-left, .fa-angle-right {
            font-size: 70px;
        }

        /*.menu-category-dropdown > li > a:after {*/
        /*    content: '\f0da';*/
        /*}*/
    </style>

    <!-- PRODUCTS -->
    {{--    @include('contents.products')--}}

    <!-- BROWSING ITEMS -->
{{--        @include('sliders.browsing_items')--}}

    <!-- Bottom Banner -->
    {{--    @include('banners.bottom')--}}
@endsection
