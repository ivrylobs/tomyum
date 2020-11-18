@extends('layouts.main')

@section('content')
    <!-- HEADER SECTION -->
    @include('headers.category_group_page', ['category' => $categoryGroup])
    <!-- CATEGORY COVER IMAGE -->
    @include('banners.category_cover', ['category' => $categoryGroup])

    <div class="container">
        <div class="row">
            @include('contents.product_list_categories_top', ['category' => $categoryGroup])
        </div>
    </div>

    <div class="container" style="background: #fff">
        <div class="section-title">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="text-left text-uppercase section-heading grey-text">New Arrivals</h3>
                </div>
            </div>
            <div class="space30"></div>
        </div>

        <div class="col-md-12 list-categories-product">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-widget">
                            @php $item = $products->first() @endphp
                            <div class="product-widget" style="">
                                <img class="product-img img-responsive" src="{{ get_inventory_img_src($item, 'medium') }}" data-name="product_image" alt="aaa" title="aaa"/>
                                <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                <div class="product-info">
                                    <h5 class="product-info-title">{!! $item->title !!}</h5>
                                    @include('layouts.pricing', ['item' => $item])
                                </div>
                            </div>
                            <div class="space20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                @php
                    $count_items = 0;
                    $products->forget(0);

                @endphp
                @foreach($products->chunk(6) as $key => $chunk)
                    <div class="row">
                        @foreach($chunk as $item)
                            @if($count_items < 12)
                                @php $count_items++ @endphp
                                <div class="col-md-2 col-xs-12 nopadding-left">
                                    <div class="product-widget" style="">
                                        <img class="product-img img-responsive" src="{{ get_inventory_img_src($item, 'medium') }}" data-name="product_image" alt="aaa" title="aaa"/>
                                        <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                        <div class="product-info">
                                            <h5 class="product-info-title">{!! $item->title !!}</h5>
                                            @include('layouts.pricing', ['item' => $item])
                                        </div>
                                    </div>
                                    <div class="space20"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
                <div class="space20"></div>
            </div>
        </div>
        <div class="space20"></div>
    </div>
    <div class="space30"></div>

    @include('weekly-popular', ['products' => $trending])

    <!-- CONTENT SECTION -->
    @include('contents.category_page', ['category' => $categoryGroup])

    <!-- BROWSING ITEMS -->
{{--    @include('sliders.browsing_items')--}}

    <!-- bottom Banner -->
    @include('banners.bottom')
@endsection

<style>


    #content-wrapper{
        min-height: 380px;
        background: rgb(237,48,36);
        background:
                linear-gradient(180deg,
                rgba(237,48,36,1) 2%,
                rgba(249,164,36,1) 22%,
                rgba(251,191,36,1) 47%,
                rgba(251,200,36,1) 65%,
                rgba(255,255,255,1) 10%);
    }
    .border-heading-yellow {
        width: 100%;
        border-bottom: 3px solid #ffc76a;
    }
    .product-widget {
        background-color: #fff;
        border: 1px solid #eee;
    }
    .list-categories-product .product-widget .product-info {
        padding: 8px 10px;
    }
    .product-info-title {
        color: #ff0003;
    }
    .section-heading {
        font-weight: bold;
        color: #ff0003;
    }
    .section-title h3 {
        margin-left: 30px;
    }
    .product-img-primary {
        object-fit: cover;
        height: 400px;
    }
</style>