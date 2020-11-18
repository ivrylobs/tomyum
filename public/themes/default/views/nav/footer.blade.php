<!-- FOOTER -->
<div class="main-footer">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-2 text-left">
            <a href="{{ url('/') }}">
            @if( Storage::exists('logo.png') )
                <img src="{{ get_storage_file_url('logo-white.png', 'full') }}" class="brand-logo" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}">
            @else
                <img src="https://placehold.it/140x60/eee?text={{ get_platform_title() }}" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}"/>
            @endif
            </a>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-3 border-mt">
            <ul class="footer-link-list border-mt-inner">
                @foreach($pages->where('position', 'footer_1st_column') as $page)
                    <li><a href="{{ get_page_url($page->slug) }}" rel="nofollow" target="_blank">{{ $page->title }}</a></li>
                @endforeach
                {{--<li><a href="{{ route('blog') }}" target="_blank">@lang('theme.nav.blog')</a></li>--}}
            </ul>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-3 border-mt">
            <ul class="footer-link-list">
                @foreach($pages->where('position', 'footer_2nd_column') as $page)
                    @if($page->slug == 'post-on-tomyumcom')
                        <li><a href="{{ url('register') }}" rel="nofollow" target="_blank">{{ $page->title }}</a></li>
                    @else
                        <li><a href="{{ get_page_url($page->slug) }}" rel="nofollow" target="_blank">{{ $page->title }}</a></li>
                    @endif
                @endforeach
                {{-- <li><a href="{{ url('/selling#faqs') }}" rel="nofollow">@lang('theme.nav.faq')</a></li>--}}
            </ul>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 border-mt">
            <ul class="footer-link-list">
                @foreach($pages->where('position', 'footer_3rd_column') as $page)
                    <li><a href="{{ get_page_url($page->slug) }}" rel="nofollow" target="_blank">{{ $page->title }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-xs-12">
            <p class="text-center copyright-text">COPYRIGHT © {{ date('Y') }} tomyum.com ALL RIGHT RESERVED.</p>
        </div>
    </div>
</div><!-- /.container -->

<style>
    .main-footer {
        background: rgb(249,164,36);
        background: -moz-linear-gradient(180deg, rgba(249,164,36,1) 50%, rgba(237,48,36,1) 90%);
        background: -webkit-linear-gradient(180deg, rgba(249,164,36,1) 50%, rgba(237,48,36,1) 90%);
        background: linear-gradient(180deg, rgba(249,164,36,1) 50%, rgba(237,48,36,1) 90%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#f9a424",endColorstr="#ed3024",GradientType=1);
    }
    .footer-link-list li a {
        color: #fff;
    }
    @media (max-width: 991px) {
        .border-mt-inner {
            border-top: 3px solid #fff;
            padding-top: 10px;
        }
    }
    .btn-primary {
        background-color: #ff0003 !important;
    }
    .account-sidebar-nav > li.active > a {
        background: #ff0003;
    }
    @media (min-width: 992px) {
        .main-footer .footer-link-list {
            border-top: 3px solid #fff;
        }
    }
    .copyright-text {
        font-size: 12px;
    }
</style>
<!-- SECONDARY FOOTER -->
{{--<footer class="user-helper-footer">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-3">--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div><!-- /.main-footer -->--}}
{{--</footer>--}}