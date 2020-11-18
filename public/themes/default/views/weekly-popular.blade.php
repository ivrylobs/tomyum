<div class="container" style="background: #fff">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <div class="space20"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="text-left text-uppercase section-heading" style="color:#FF0002">Popular Items</h3>
                    </div>
                </div>
            </div>

            <div class="row row-box" style="padding: 10px 40px">
                <div class="">
                    @foreach($products as $key => $item)
                        <div class="col-md-2">

                            <div class="product-widget">
                                <img class="product-img img-responsive" src="{{ get_inventory_img_src($item, 'medium') }}" data-name="product_image" alt="aaa" title="aaa"/>
                                <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                <div class="product-info">
                                    <h5 class="product-info-title">{!! $item->title !!}</h5>
                                    @include('layouts.pricing', ['item' => $item])
                                </div>
                            </div>
                            <div class="space20"></div>
                        </div>

                    @endforeach
                </div>
            </div>

            <style>
                .d-flex {
                    display: flex;
                    justify-content: center;
                }

                .d-flex > div {
                    padding: 0 5px;
                }

                .d-flex > div:first-child {
                    padding-left: 15px;
                }

                .product-widget {
                    border: none;
                }

                .product-info-title {
                    color: #FF0002;
                }
            </style>
            {{--            <div class="row row-box" style="padding: 10px 40px">--}}
            {{--                @php $k = 1 @endphp--}}
            {{--                @for($i=0; $i<1; $i++)--}}
            {{--                    @if($i==1)--}}
            {{--                        <div class="space20"></div>--}}
            {{--                    @endif--}}
            {{--                    <div class="row">--}}
            {{--                        @for($j=0; $j<6; $j++)--}}
            {{--                            <div class="col-md-2">--}}
            {{--                                <div class="product-widget">--}}
            {{--                                    <img class="product-img img-responsive" src="{{ get_storage_file_url('tom2/na'. $k++ .'.png', 'medium') }}" data-name="product_image" alt="aaa" title="aaa"/>--}}
            {{--                                    <a class="product-link" href="#"></a>--}}
            {{--                                    <div class="product-info">--}}
            {{--                                        <h5 class="product-info-title">Product Name</h5>--}}
            {{--                                        <div class="product-info-price">--}}
            {{--                                            <span class="product-info-price-new text-right">{!! get_formated_price(999, 0) !!}</span>--}}
            {{--                                        </div>--}}
            {{--                                        --}}{{--                                        @include('layouts.ratings-custom', ['ratings' => 3])--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="space20"></div>--}}
            {{--                            </div>--}}
            {{--                        @endfor--}}
            {{--                    </div>--}}
            {{--                @endfor--}}

            {{--            </div>--}}
        </div>
    </div>
</div>
<div class="space30"></div>
