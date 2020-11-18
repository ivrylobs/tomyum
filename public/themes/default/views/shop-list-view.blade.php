@extends('layouts.main')

@section('content')
    <div class="container-fluid nopadding-left nopadding-right">
        <div class="row main-banner">
            <img src="{{ get_storage_file_url('BANNER_TRUDI_2_en.png', 'full') }}" alt="" class="img-responsive">
        </div>
    </div>
    <div class="space30"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <img src="{{ get_storage_file_url('22222.png', 'full') }}" alt="" class="img-responsive">
            </div>
            <div class="col-md-8 col-xs-12">
                <h5><b>MIX ON</b></h5>
                <p>แบรนด์แฟชั่นสัญชาติไทย</p>
            </div>
        </div>
        <div class="space30"></div>

        <div class="row">
            <div class="space30"></div>
            <div class="col-md-12">
                <div class="section-title">
                    <div class="row">
                        <div class="col-xs-8">
                            <h3 class="text-left text-uppercase section-heading">Feature Products</h3>
                        </div>
                    </div>
                    <div class="space10"></div>
                </div>
                <div class="row row-box">
                    <div class="owl-carousel product-carousel">
                        @foreach($products as $item)
                            <div class="product-widget" style="margin:0">
                                <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}"
                                     data-name="product_image"
                                     alt="{{ $item->title }}" title="{{ $item->title }}"/>
                                <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                <div class="product-info">
                                    <h5 class="product-info-title">{!! $item->title !!}</h5>
                                    @include('layouts.pricing', ['item' => $item])
                                    {{--      @include('layouts.ratings-custom', ['ratings' => $item->feedbacks->avg('rating')])--}}
                                </div>
                            </div>
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
                    <div class="owl-carousel product-carousel">
                        @foreach($products as $item)
                            <div class="product-widget" style="margin:0">
                                <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}"
                                     data-name="product_image"
                                     alt="{{ $item->title }}" title="{{ $item->title }}"/>
                                <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                <div class="product-info">
                                    <h5 class="product-info-title">{!! $item->title !!}</h5>
                                    @include('layouts.pricing', ['item' => $item])
                                    {{--      @include('layouts.ratings-custom', ['ratings' => $item->feedbacks->avg('rating')])--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row row-box">
                    <div class="owl-carousel product-carousel">
                        @foreach($products as $item)
                            <div class="product-widget" style="margin:0">
                                <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}"
                                     data-name="product_image"
                                     alt="{{ $item->title }}" title="{{ $item->title }}"/>
                                <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                <div class="product-info">
                                    <h5 class="product-info-title">{!! $item->title !!}</h5>
                                    @include('layouts.pricing', ['item' => $item])
                                    {{--      @include('layouts.ratings-custom', ['ratings' => $item->feedbacks->avg('rating')])--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row row-box">
                    <div class="owl-carousel product-carousel">
                        @foreach($products as $item)
                            <div class="product-widget" style="margin:0">
                                <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}"
                                     data-name="product_image"
                                     alt="{{ $item->title }}" title="{{ $item->title }}"/>
                                <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                                <div class="product-info">
                                    <h5 class="product-info-title">{!! $item->title !!}</h5>
                                    @include('layouts.pricing', ['item' => $item])
                                    {{--      @include('layouts.ratings-custom', ['ratings' => $item->feedbacks->avg('rating')])--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <div class="pagination">
                <a href="#" class="disabled">«</a>
                <a href="#" class="">1</a>
                <a href="https://tomyum.skrealtyplus.com/blog?page=2" class="active">2</a>
                <a href="https://tomyum.skrealtyplus.com/blog?page=2">3</a>
                <a href="https://tomyum.skrealtyplus.com/blog?page=2">4</a>
                <a href="https://tomyum.skrealtyplus.com/blog?page=2" rel="next">»</a>
            </div>
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
                            <div class="media space20">
                                <div class="row media-body">
                                    <div class="col-xs-2 text-right">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <label> 470 ถนน บางขุนเทียนชายทะเล แขวงแสมดำ  </label>
                                        <label> เขตบางขุนเทียน กรุงเทพมหานคร 10150 </label>
                                    </div>
                                </div>
                                <div class="space10"></div>
                                <div class="row media-body">
                                    <div class="col-xs-2 text-right">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <label> 081-470-6767 </label>
                                    </div>
                                </div>
                                <div class="space10"></div>
                                <div class="row media-body">
                                    <div class="col-xs-2 text-right">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <label> mixon@josoco.com </label>
                                    </div>
                                </div>
                                <div class="space10"></div>
                                <div class="row media-body">
                                    <div class="col-xs-2 text-right">
                                        <i class="fa fa-facebook-official"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <label> no@nomail.com </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-4 -->

                <div class="col-md-8">
                    @include('forms.contact')
                </div><!-- /.col-md-8 -->
            </div>
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
        .contact-us-form label {
            color: #333;
            font-size: 16px;
            font-weight: normal;
        }
        #content-wrapper { background: #fff; }
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
    </style>
    <style>
        .main-banner img {
            width: 100%;
        }
        .section-heading {
            color: #FF0002;
        }
        .g-recaptcha {
            overflow: hidden;
        }
    </style>
@endsection

