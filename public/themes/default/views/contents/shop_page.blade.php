<div class="container-fluid nopadding-left nopadding-right">
    <div class="row main-banner">
        @if($shop->featuredImage()->first())
            <img src="{{ get_storage_file_url($shop->featuredImage()->first()->path, 'full') }}" alt="" class="img-responsive">
        @else
            <img src="https://placehold.it/1920x400/eee?text=1920x400" class="brand-logo" alt="LOGO" title="LOGO"/>
        @endif
    </div>
</div>

<div class="space30"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xs-12">
            @if(isset($products[0]->shop->image->path))
                <img src="{{ get_storage_file_url( $products[0]->shop->image->path , 'full') }}" alt="" class="img-responsive">
            @endif
        </div>
        <div class="col-md-8 col-xs-12">
            @if(isset($products[0]))
                <h5><b>{{ $products[0]->shop->name }}</b></h5>
                <p>{!! $products[0]->shop->description !!}</p>
            @endif
        </div>
    </div>
    <div class="space30"></div>

    <div class="row">
        <div class="space30"></div>
        <div class="col-md-12">
            <div class="section-title">
                <div class="row">
                    <div class="col-xs-8">
                        <h3 class="text-left text-uppercase section-heading">Featured Products</h3>
                    </div>
                </div>
                <div class="space10"></div>
            </div>
            <div class="row row-box">
                <div class="owl-carousel product-carousel">
                    @foreach($featuredProducts as $key => $item)
                        @if($key < 6)
                            <div class="product-widget" style="margin:0">
                                <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}" data-name="product_image" alt="{{ $item->title }}" title="{{ $item->title }}"/>
                                <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                <div class="product-info">
                                    <h5 class="product-info-title">{!! $item->title !!}</h5>
                                    @include('layouts.pricing', ['item' => $item])
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="space30"></div>
        <div class="col-md-12">
            <div class="section-title">
                <div class="row">
                    <div class="col-xs-8">
                        <h3 class="text-left text-uppercase section-heading">Our Products</h3>
                    </div>
                </div>
                <div class="space10"></div>
            </div>
            <div class="row row-box">
                <div class="">
                    @foreach($products->chunk(6) as $chunk)
                        <div class="row">
                            @foreach($chunk as $item)
                                <div class="col-md-2">
                                    <div class="product-widget" style="margin:0">
                                        <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}"
                                             data-name="product_image"
                                             alt="{{ $item->title }}" title="{{ $item->title }}"/>
                                        <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                        <div class="product-info">
                                            <h5 class="product-info-title">{!! $item->title !!}</h5>
                                            @include('layouts.pricing', ['item' => $item])
                                            {{-- @include('layouts.ratings-custom', ['ratings' => $item->feedbacks->avg('rating')])--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        {{ $products->links('layouts.pagination') }}
    </div>
</div>

<!-- CONTENT SECTION -->
<div class="clearfix space50"></div>

<div class="container">
    <h1 class="contact-us-title">Contact Us</h1>
    <div class="space30"></div>
    <div class="row">
        <div class="col-md-4">
            <div class="contact-info">
                <div class="media-list">
                    {{--                    @if(config('system_settings.support_phone_toll_free'))--}}
                    {{--                        <div class="media space20">--}}
                    {{--                            <i class="pull-left fa fa-phone-square"></i>--}}
                    {{--                            <div class="media-body">--}}
                    {{--                                <h4>@lang('theme.phone'): (@lang('theme.toll_free'))</h4>--}}
                    {{--                                {{ config('system_settings.support_phone_toll_free') }}--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                    {{--                    @if(config('system_settings.support_phone'))--}}
                    {{--                        <div class="media space20">--}}
                    {{--                            <i class="pull-left fa fa-phone"></i>--}}
                    {{--                            <div class="media-body">--}}
                    {{--                                <h4>@lang('theme.phone'):</h4>--}}
                    {{--                                {{ config('system_settings.support_phone') }}--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                    {{--                    @if(config('system_settings.support_email'))--}}
                    {{--                        <div class="media space20">--}}
                    {{--                            <i class="pull-left fa fa-envelope-o"></i>--}}
                    {{--                            <div class="media-body">--}}
                    {{--                                <h4>@lang('theme.email'):</h4>--}}
                    {{--                                <a href="mailto:{{ config('system_settings.support_email') }}">{{ config('system_settings.support_email') }}</a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                    <div class="media space20">
                        <div class="row media-body">
                            <div class="col-xs-2 text-right">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="col-xs-10">
                                @if(isset($products[0]->shop->addresses[0]->address_title))
                                    <label for="">{{ $products[0]->shop->addresses[0]->address_title }}</label>
                                @endif
                                @if(isset($products[0]->shop->addresses[0]->address_line_1))
                                    <label for="">{{ $products[0]->shop->addresses[0]->address_line_1 }}</label>
                                @endif
                                @if(isset($products[0]->shop->addresses[0]->address_line_2))
                                    <label for="">{{ $products[0]->shop->addresses[0]->address_line_2 }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="row media-body">
                            <div class="col-xs-2 text-right">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="col-xs-10">
                                <!-- <p>  {{ isset($products[0]->shop->addresses[0]->phone) ? 'เบอร์โทร '.$products[0]->shop->addresses[0]->phone : '' }} </p> -->
                                <p>  {{ isset($products[0]->shop->addresses[0]->phone) ? $products[0]->shop->addresses[0]->phone : '' }} </p>
                            </div>
                        </div>
                        <div class="row media-body">
                            <div class="col-xs-2 text-right">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="col-xs-10">
                                <!-- <p>  {{ isset($products[0]->shop->addresses[0]->phone) ? 'เบอร์โทร '.$products[0]->shop->addresses[0]->phone : '' }} </p> -->
                                <p>  {{ isset($products[0]->shop->email) ? $products[0]->shop->email : '' }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.col-md-4 -->

        <div class="col-md-8">
            @include('forms.contact_merchant', ['shop' => $shop])
        </div><!-- /.col-md-8 -->
    </div>
    <div class="space50"></div>
</div>
<!-- END CONTENT SECTION -->
<div class="clearfix space50"></div>

<div class="container-fluid nopadding">
    <div id="googleMap" style="width:100%;height:500px;"></div>
</div>


<script>
    function initMap() {
        const myLatLng = {
            lat: 13.6324111,
            lng: 100.3479364
        };
        const map = new google.maps.Map(document.getElementById("googleMap"), {
            zoom: 15,
            center: myLatLng
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!"
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsFVFfd3E1DafxE2B8W-m7jOZEMPyBhYM&callback=initMap"></script>
<style>
    .media-body {
        color: #FF0002;
    }

    .product-info-title {
        color: #ff0003;
    }

    .contact-us-form label {
        color: #333;
        font-size: 16px;
        font-weight: normal;
    }

    #content-wrapper {
        background: #fff;
    }

    .contact-us-title {
        text-transform: uppercase;
        font-weight: bold;
        color: #FF0002;
        letter-spacing: 1px;
    }

    .media-body {
        display: initial;
    }

    .flat {
        border-color: #333;
    }

    .main-banner img {
        width: 100%;
    }

    .section-heading {
        color: #FF0002;
    }

    .g-recaptcha {
        overflow: hidden;
    }

    #btn-send-msg {
        background: #FF0002 !important;
    }

    .contact-us-form label {
        color: #FF0002;
        font-size: 16px;
        font-weight: normal;
    }

    .help-block with-errors {
        display: inline-block;
    }

    .contact-us-form .flat {
        border-radius: 20px !important;
        border-color: #FF0002;
    }

    label {
        font-weight: normal;
    }

    .g-recaptcha {
        overflow: hidden;
    }
    .contact-info .media-body, .contact-us-form label{color: #333 !important;}
</style>


<div style="display: none">

    <div class="clearfix space20"></div>
    <section>
        <div class="container">
            <div class="row">


                @if($products->count())

                    @include('contents.product_list')

                @else

                    <div class="clearfix space50"></div>
                    <p class="lead text-center space50">
                        <span class="space50">@lang('theme.no_product_found')</span><br/>
                    <div class="space50 text-center">
                        <a href="{{ url('categories') }}" class="btn btn-primary btn-sm flat">@lang('theme.button.choose_from_categories')</a>
                    </div>
                    </p>
                    <div class="clearfix space50"></div>

                @endif
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
</div><!-- /.container -->