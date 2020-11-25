<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('meta')
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;600&display=swap" rel="stylesheet">
        <link href="{{ theme_asset_url('css/vendor.css') }}" rel="stylesheet">
        <link href="{{ theme_asset_url('css/style.css') }}" rel="stylesheet">
        <link href="{{ theme_asset_url('css/custom-style.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Prompt', sans-serif;
            }

            .modal-open .modal {
                z-index: 100000000000;
            }

        </style>

    </head>
    <body class="{{ config('active_locales')->firstWhere('code', App::getLocale())->rtl ? 'rtl' : 'ltr'}}">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
        your browser</a> to improve your experience and security.</p>
    <![endif]-->

    @if(Session::has('global_announcement'))
        <div id="global-announcement" style="z-index: 9999999999">
            {!! session('global_announcement')->parsed_body !!}
            @if(session('global_announcement')->action_url)
              <span class="indent10">
                <a href="{{ session('global_announcement')->action_url }}" class="btn btn-sm">
                    {{ session('global_announcement')->action_text }}
                </a>
              </span>
            @endif
        </div>
    @endif

    <div id="global-wrapper" class="clearfix">


    <!-- MAIN NAVIGATIONS -->
        @include('nav.main')

    <!-- MAIN CONTENT -->
        <div id="content-wrapper">
            <!-- VALIDATION ERRORS -->
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 150px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ trans('theme.error') }}!</strong> {{ trans('messages.input_error') }}<br><br>
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </div>

        <!-- MAIN FOOTER -->
        @include('nav.footer')

    <!-- COPYRIGHT AREA -->
        @include('nav.copyright')
    </div><!-- /#global-wrapper -->

    <div id="loading">
        <img id="loading-image" src="{{ theme_asset_url('img/loading.gif') }}" alt="busy...">
    </div>

    <!-- MODALS -->
    @unless(Auth::guard('customer')->check())
        @include('auth.modals')
    @endunless

    <!-- Quick View Modal-->
    <div id="quickViewModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>

    <!-- Address Edit Modal-->
    <div id="addressFormModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>

    <!-- SCRIPTS -->
    <script src="{{ theme_asset_url('js/vendor.js') }}"></script>
    <script src="{{ theme_asset_url('js/jquery.simplecolorpicker.js') }}"></script>

    <!-- Notification -->
    @include('notifications')

    <!-- AppJS -->
    @include('scripts.appjs')

    <!-- Page Scripts -->
    @yield('scripts')

    <script>
        $(function() {
            return $(".modal").on("show.bs.modal", function() {
                var curModal;
                curModal = this;
                $(".modal").each(function() {
                    if (this !== curModal) {
                        $(this).modal("hide");
                    }
                });
            });
        });

        $('document').ready(function(){
            $('.navbar-toggle').click(function(){
                var curModal;
                curModal = this;
                $(".modal").each(function() {
                    if (this !== curModal) {
                        $(this).modal("hide");
                    }
                });
            })
            calcPrice();


            // $('.color-selected').text($( "#select-color option:selected" ).text());
            //
            // if($( "#select-color option:selected" ).text() != '') {
            //     $('.color-selected').parent().show();
            //     $('.pattern-type').text( $('.info-label-attr').text().replace(/:/g,''));
            // }
            //

            $('#select-color').on('change', function(){
                $('.color-selected').show().text($( "#select-color option:selected" ).text());
                generateDetail()
            });
            $('#select-model').on('change', function(){
                $('.model-selected').show().text($( "#select-model option:selected" ).text());
                generateDetail()
            });
            generateDetail()

        });

        function generateDetail() {
            var model = '';
            var color = '';

            if($( "#select-model option:selected" ).text() != '') {
                model = 'แบบ ' + $( "#select-model option:selected" ).text() + ', '
            }

            if($( "#select-color option:selected" ).text() != '') {
                color = 'สี' + $( "#select-color option:selected" ).text() + ', '
            }

            $('.detail').text(model  + color);
        }

        $('.product-info-qty-input').on('change', function () {
            calcPrice();
        })

        function calcPrice() {
            $('#sum_amount_1').text($('#product_quantity_1').val());
            $('#sum_amount_2').text($('#product_quantity_2').val());
            $('#sum_amount_3').text($('#product_quantity_3').val());

            var total_pieces  = 0;

            $('.product-info-qty-input-ov').each(function() {
                total_pieces += Number($(this).val());
            });

            var amount_value_1 = $('#amount_value_1').data('amount');
            var amount_value_2 = $('#amount_value_2').data('amount');

            var price = 1;
            $('.b-color').css('color', '#0d0d0d')
            if(total_pieces <= amount_value_1) {
                price = $('#size_price_1').text();
                $('#size_price_1').parent().css('color', 'red');
            }  else if(total_pieces <= amount_value_2) {
                price = $('#size_price_2').text();
                $('#size_price_2').parent().css('color', 'red');
            } else {
                price = $('#size_price_3').text();
                $('#size_price_3').parent().css('color', 'red');
            }

            if($('#size_price_1').text() == '') {
                price = parseInt($('.product-info-price-new').data('price'))
            }

            $('#sum_size_1').text((price * $('#product_quantity_1').val() ))
            $('#sum_size_2').text((price * $('#product_quantity_2').val() ))
            $('#sum_size_3').text((price * $('#product_quantity_3').val() ))

            var total_price  = 0;

            $('.sum-size').each(function() {
                total_price += Number($(this).text());
                $(this).text(numberWithCommas($(this).text()))
            });

            $('#total-price').text(numberWithCommas(total_price))
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        var menuHeight = $(".fixed-head").height();
        $("#page-container").css("margin-top", menuHeight + 20);
        $( window ).resize(function() {
            var menuHeight = $(".fixed-head").height();
            $("#page-container").css("margin-top", menuHeight + 20);
        });

    </script>

    <style>
        .navbar-item-mergin-top, .navbar-nav a{
            font-weight: normal;
        }
        @media screen and (min-width: 768px) {
            .modal {
                top: 20% !important;
            }
            .product-widget img {
                object-fit: cover;
                height: 300px;
                /*object-position: -20% 0;*/
            }
        }

        @media screen and (max-width: 767px) {
            .modal {
                top: 35% !important;
            }
            #page-container{
                margin-top: 0 !important;
            }
        }

    </style>

    @auth('customer')
    <style>
        .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
        }

        /* The popup chat - hidden by default */
        .chat-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
        }

        /* Full-width textarea */
        .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        min-height: 200px;
        }

        /* When the textarea gets focus, do something */
        .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Set a style for the submit/send button */
        .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
        background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
        opacity: 1;
        }
    </style>

    <button class="open-button" onclick="openForm()">Chat</button>

    <div class="chat-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
            <h1>Chat</h1>

            <label for="msg"><b>Message</b></label>
            <textarea placeholder="Type message.." name="msg" required></textarea>

            <button type="submit" class="btn">Send</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script>
        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }
    </script>
    @else
    <h1>Failed to loaded User data</h1>
    @endauth
    </body>
</html>