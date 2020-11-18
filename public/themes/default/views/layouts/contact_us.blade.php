<!-- CONTENT SECTION -->
<div class="clearfix space20"></div>
<section>
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
                                    <label>Head office (สำนักงานใหญ่)</label>
                                    <label>บริษัท จงสถิตย์ จำกัด</label>
                                    <label>ที่อยู่ 470 ถนนบางขุนเทียน-ชายทะเล แขวงแสมดำ เขตบางขุนเทียน กรุงเทพมหานคร 10150</label>
                                    <br>
                                    <br>
                                    <label>
                                        Customer Service (ฝ่ายลูกค้าสัมพันธ์)</label>
                                    <label>
                                        ที่อยู่ 99 ม.1 ซ.วัดโพธิ์แจ้ ต.แคราย อ.กระทุ่มแบน จ.สมุทรสาคร 74110(ปักหมุดที่นี่)
                                    </label>
                                </div>
                            </div>
                            <div class="row media-body">
                                <div class="col-xs-2 text-right">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p> เบอร์โทร 083-345-8000 </p>
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
        <div class="space50"></div>
    </div>
    <div class="container-fluid nopadding">
        <div id="googleMap" style="width:100%;height:500px;"></div>
    </div>
</section>
<!-- END CONTENT SECTION -->
<style>
    #content-wrapper {
        background: #fff;
    }

    .contact-us-title {
        text-transform: uppercase;
        font-weight: bold;
        color: #FF0002;
        text-align: center;
        letter-spacing: 1px;
    }

    .media-body {
        color: #FF0002;;
        display: initial;
    }

    .fa-map-marker, .fa-phone {
        float: left;
        margin-right: 15px;
        font-size: 44px;
    }
</style>

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