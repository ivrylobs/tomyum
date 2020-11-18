<nav class="navbar navbar-default navbar-main navbar-light navbar-top fixed-head">
    <div id="topbar">
        <div class="container-fluid">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" style="float: left">
                        <li class="">
{{--                            <a class="red-color text-uppercase" href="#nav-login-dialog" data-toggle="modal" data-target="#sellerCenterModal">Seller Center</a>--}}
                            <a class="red-color text-uppercase" href="{{ url('/login') }}" >Seller Center</a>
                        </li>
                        <li class="">
{{--                            <a class="red-color text-uppercase" href="#nav-login-dialog" data-toggle="modal" data-target="#createSellerAccountModal">Sell on Tomyum</a>--}}
                            <a class="red-color text-uppercase" href="{{ url('/register') }}">Sell on Tomyum</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav" style="float: right">
                        @if(count(config('active_locales')) > 1)
                            <li class="dropdown lang-dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    {{ config('active_locales')->firstWhere('code', App::getLocale())->language }}
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach(config('active_locales') as $lang)
                                        <li class="{{$lang->code == \App::getLocale() ? '' : ''}}">
                                            <a href="{{route('locale.change', $lang->code)}}" style="color:#777">
                                                {{--   <img src="{{asset(sys_image_path('flags') . array_slice(explode('_', $lang->php_locale_code), -1)[0] . '.png')}}" class="lang-flag">--}}
                                                {{ $lang->language }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        @if(count(config('active_locales')) > 1)
                            <li class="dropdown lang-dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    THB
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                        <li class="{{$lang->code == \App::getLocale() ? '' : ''}}">
                                            <a href="{{route('locale.change', $lang->code)}}" style="color:#777">
                                                THB
                                            </a>
                                        </li>
                                    <li class="{{$lang->code == \App::getLocale() ? '' : ''}}">
                                        <a href="{{route('locale.change', $lang->code)}}" style="color:#777">
                                            USD
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar-header brand-centered">
            <a class="navbar-brand" href="{{ url('/') }}">
                @if( Storage::exists('logo-new.png') )
                    <img src="{{ get_storage_file_url('logo-new.png', 'full') }}" class="brand-logo" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}">
                @else
                    <img src="https://placehold.it/140x60/eee?text={{ get_platform_title() }}" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}"/>
                @endif
            </a>
        </div>
        {!! Form::open(['route' => 'inCategoriesSearch', 'method' => 'GET', 'id' => 'search-categories-form', 'class' => 'navbar-left navbar-form navbar-search', 'role' => 'search']) !!}
        <div class="form-group">
{{--            {!! Form::text('q', Request::get('q'), ['class' => 'form-control', 'placeholder' => trans('theme.keyword')]) !!}--}}
            <input type="text" name="q" class="form-control" placeholder="{{ trans('theme.keyword') }}">
        </div>
        <div class="form-group">
            <a class="fa fa-search navbar-search-submit" onclick="document.getElementById('search-categories-form').submit()"><span>SEARCH</span></a>
        </div>
        {!! Form::close() !!}

        <ul class="nav navbar-nav navbar-right navbar-mob-left">
{{--            <li>--}}
{{--                <a href="{{ route('cart.index') }}">--}}
{{--                    <span>{{ trans('theme.your_cart') }}</span>--}}
{{--                    <i class="fa fa-shopping-bag"></i>--}}
{{--                    <div id="globalCartItemCount" class="badge">{{ cart_item_count() }}</div>--}}
{{--                </a>--}}
{{--            </li>--}}

            @auth('customer')
                <li class="dropdown">
                    <a href="{{ route('account', 'dashboard') }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        <span>{{ trans('theme.hello') . ', ' . Auth::guard('customer')->user()->getName() }}</span> {{ trans('theme.manage_your_account') }}
                    </a>
                    <ul class="dropdown-menu nav-list">
                        <li>
                            <a href="{{ route('account', 'dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> @lang('theme.nav.dashboard')</a></li>
                        {{--            <li><a href="{{ route('account', 'orders') }}"><i class="fa fa-shopping-cart fa-fw"></i> @lang('theme.nav.my_orders')</a></li>--}}
                        <li>
                            <a href="{{ route('account', 'wishlist') }}"><i class="fa fa-heart-o fa-fw"></i> @lang('theme.nav.my_wishlist')
                            </a></li>
                        <li>
                            <a href="{{ route('account', 'messages') }}"><i class="fa fa-envelope-o fa-fw"></i> @lang('theme.my_messages')
                            </a></li>
                         <li><a href="{{ url('page/contact-us') }}"><i class="fa fa-rocket fa-fw"></i> Support</a></li>
                        {{-- <li><a href="{{ route('account', 'coupons') }}"><i class="fa fa-tags fa-fw"></i> @lang('theme.nav.my_coupons')</a></li>--}}
                        {{-- <li><a href="{{ route('account', 'gift_cards') }}"><i class="fa fa-gift fa-fw"></i> @lang('theme.nav.gift_cards')</a></li> --}}
                        <li>
                            <a href="{{ route('account') }}"><i class="fa fa-user fa-fw"></i> @lang('theme.nav.my_account')</a></li>
                        <li class="sep"></li>
                        <li>
                            <a href="{{ route('customer.logout') }}"><i class="fa fa-power-off fa-fw"></i> {{ trans('theme.logout') }}
                            </a></li>
                    </ul>
                </li>
            @else
                <li class="auth">
                    <a class="red-color text-uppercase" href="#nav-login-dialog" data-toggle="modal" data-target="#loginModal" style="float: left"><i class="fa fa-user-o"> </i> {{ trans('theme.button.login') }}</a>
                </li>
                <li style="margin-top: 5px;color:#b6b6b6">|</li>
                <li>
                    <a class="red-color text-uppercase" href="#nav-login-dialog" data-toggle="modal" data-target="#createAccountModal">{{ trans('theme.register') }}</a>
                </li>
            @endauth

            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false">
                    <span class="sr-only">{{ trans('theme.nav.menu') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </ul>
        <div class="collapse navbar-collapse" id="main-nav-collapse">
            <ul class="nav navbar-nav divider-between" style="float:left">
                <li>
                    {{--   <a class="navbar-item-mergin-top" href="{{ url('/selling') }}">{{ trans('theme.nav.sell_on', ['platform' => get_platform_title()]) }}</a>--}}
                    <a class="navbar-item-mergin-top" href="{{ url('/') }}">Home</a>
                </li>
                <li class="hidden-xs"><p>|</p></li>

                @foreach($pages->where('position', 'main_nav')->where('slug', '<>', 'party') as $page)
                    @if($page->slug == 'products')
                        <li><a href="{{ url('categories') }}" class="navbar-item-mergin-top">All Product</a></li>
                        <li class="hidden-xs"><p>|</p></li>
                    @elseif($page->slug == 'blogs-and-vdos')
                        <li><a href="{{ url('blog') }}" class="navbar-item-mergin-top">{{ $page->title }}</a></li>
                        <li class="hidden-xs"><p>|</p></li>
                    @elseif($page->slug == 'shop-list-party')
                        <li>
                            <a href="{{ url('shop-list') }}" class="navbar-item-mergin-top">{{ $page->title }}</a>
                        </li>
                        <li class="hidden-xs"><p>|</p></li>
                    @else
                        <li>
                            <a href="{{ get_page_url($page->slug) }}" class="navbar-item-mergin-top">{{ $page->title }}</a>
                        </li>
                    @endif
                @endforeach

                <li>
                    <a class="navbar-item-mergin-top" href="{{ url('page/contact-us') }}">Contact us</a>
                </li>
                <li class="visible-xs dropdown lang-dropdown nav-lang">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        {{ config('active_locales')->firstWhere('code', App::getLocale())->language }}
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(config('active_locales') as $lang)
                            <li class="{{$lang->code == \App::getLocale() ? '' : ''}}">
                                <a href="{{route('locale.change', $lang->code)}}" style="color:#777">
                                    {{ $lang->language }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="visible-xs dropdown lang-dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        THB
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{$lang->code == \App::getLocale() ? '' : ''}}">
                            <a href="{{route('locale.change', $lang->code)}}" style="color:#777">
                                THB
                            </a>
                        </li>
                        <li class="{{$lang->code == \App::getLocale() ? '' : ''}}">
                            <a href="{{route('locale.change', $lang->code)}}" style="color:#777">
                                USD
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-main .navbar-nav > li.open > a {
        color: #ff0004 !important;
        background: #fff !important;
    }

    .lang-dropdown {
        text-transform: uppercase;
    }

    .navbar-light .navbar-nav > li > a > span {
        /*color: #fff;*/
    }

    .dropdown-menu {
        background: #fff;
    }

    .bg-white {
        background: #fff;
    }

    .detail-category-name {
        position: absolute;
        top: 50%;
        left: 50%;
        color: #fff;
        text-align: center;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
    }

    /*end can remove*/
    @media (max-width: 991px) {
        .brand-centered .navbar-brand {
            margin-top: 50px;
        }
    }

    @media (max-width: 768px) {
        .navbar-search {
            margin: 50px 0 0 0;
        }
    }

    .divider-between li p {
        color: #b6b6b6;
        margin-top: 12px;
    }

    .navbar-top .navbar-nav > li > a {
        padding: 5px 12px;
    }

    .divider-between > li > a {
        padding: 7px 30px;
    }

    .navbar-brand {
        padding: 0;
    }

    .navbar-brand > img {
        max-width: 160px;
    }
    @media screen and (min-width: 768px) {
        .navbar-search-submit {
            left: 75%;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .divider-between {
            margin-left: 170px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            /*width: 95%;*/
        }
    }

    .navbar-top {
        padding-top: 0;
    }

    #topbar {
        background-color: #ff0004;
    }

    #topbar ul {
        list-style-type: none;
    }

    #topbar li {
        /*float: left;*/
    }

    #topbar .navbar-nav li a {
        display: block;
        color: white;
        padding: 8px 12px;
        text-decoration: none;
        text-transform: uppercase;
    }

    #topbar .navbar-nav li:hover {
        /*background-color: #fff;*/
    }

    #topbar .navbar-nav li a:hover {
        /*color: #ff0004;*/
        color: #fff;
    }

    @media (min-width: 992px) {
        .main-footer .border-mt {
            padding-left: 0;
            padding-right: 0;
            margin-top: 40px;
        }

        #content-wrapper {
            margin-top: 160px;
        }
    }

    @media (max-width: 991px) {
        #content-wrapper {
            margin-top: 150px;
        }
        .left-side-category-inner {
            margin-left: 10px;
        }
        .ei-slider-wrapper {
            margin-right: 10px;
        }
        .featured .col-md-6:first-child {
            padding-left: 7.5px;
        }
        .featured .col-md-6:last-child {
            padding-right: 7.5px;
        }
    }

    .fixed-top {
        position: fixed;
        top: 145px;
        width: 100%;
        z-index: 10000;
        margin-top: 0 !important;
    }
    .fixed-head {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 10000;
        margin-top: 0;
        box-shadow: 1px 1px 10px #eee;
    }

    .navbar-item-mergin-top {
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .navbar-light .navbar-search-submit {
        padding: 0 100px 10px 30px;
    }

    .navbar-search .form-control {
        border-radius: 0;
        width: 75%;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .red-color {
        color: #FF0002;
    }

    .navbar-light .navbar-nav > li > a {
        color: #FF0002;
    }

    .fa-search:before {
        content: "\f002";
        margin-right: 5px;
    }

    @media screen and (min-width: 768px) {
        .navbar-search-submit {
            left: 75%;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }
    }

    .navbar-menu {
        z-index: 3;
    }
</style>