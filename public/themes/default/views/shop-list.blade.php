@extends('layouts.main')

@section('content')
    <!-- Blog COVER IMAGE -->
    @include('banners.blog_cover')

    <!-- CONTENT SECTION -->
    <div class="container-fluid nopadding">
        <div id="ei-slider" class="ei-slider">
            <ul class="ei-slider-large">
                @foreach($sliders as $slider)
                    <li>
                        <a href="{{ $slider['link'] }}">
                            <img src="{{ get_storage_file_url($slider['featured_image']['path'], 'main_slider') }}" alt="{{ $slider['title'] ?? 'Slider Image ' . $loop->count }}">
                        </a>
                        <div class="ei-title">
                            <h2 style="color: {{ $slider['title_color'] }}">{{ $slider['title'] }}</h2>
                            <h3 style="color: {{ $slider['sub_title_color'] }}">{{ $slider['sub_title'] }}</h3>
                        </div>
                    </li>
                @endforeach
            </ul>

            <ul class="ei-slider-thumbs">
                <li class="ei-slider-element">Current</li>
                @foreach($sliders as $slider)
                    <li>
                        <a href="#">Slide {{ $loop->count }}</a>
                        <img src="{{ isset($slider['images'][0]['path']) ?
                    get_storage_file_url($slider['images'][0]['path'], 'slider_thumb') :
                    get_storage_file_url($slider['featured_image']['path'], 'slider_thumb') }}" alt="thumbnail {{ $loop->count }}"
                        />
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div style="background: linear-gradient(180deg, #F7D121 20%, #EAEAEA 50%)">
        <div class="container">
            <div class="space30"></div>

            <!-- LEFT CAT -->
            <div class="space20"></div>
            <div class="row left-side-category">
                <div class="col-md-3 col-xs-12 left-side-category-inner">
                    <div class="category-menu">
                        <ul class="menu-category-dropdown Horizontal-Menu">
                            <h3 class="cate-head">Shop List</h3>
                            <li>
                                <a href="{{ url('shop-list') }}">All</a>
                                <hr>
                            </li>
                            @foreach($all_categories as $catGroup)
                                @if($catGroup->subGroups->count())
                                    @php
                                        $categories_count = $catGroup->subGroups->sum('categories_count');
                                        $cat_counter = 0;
                                    @endphp

                                    <li>
                                        <a href="{{ url('shop-list/' . $catGroup->slug) }}"><span>{{ $catGroup->name }}</span></a>
                                        <hr>
                                        <div style="display: none" class="category-section {{$categories_count > 15 ? 'expanded' : ''}}">
                                            <div class="category-section-inner" style="z-index: 99999">
                                                <div class="category-section-content">
                                                    <div class="row category-grid">
                                                        <div class="col-md-12">
                                                            @foreach($catGroup->subGroups as $subGroup)
                                                                @if($cat_counter >= 7)
                                                                    {{-- If the end categories are more than 7 then breack the line --}}
                                                        </div> <!-- /.col-md-6 -->
                                                        <div class="col-md-12">
                                                            @php
                                                                $cat_counter = 0; //Reset the counter
                                                            @endphp
                                                            @endif

                                                            <h5 class="nav-category-inner-title">
{{--                                                                <a href="{{ route('categories.browse', $subGroup->slug) }}">{{ $subGroup->name }}</a>--}}
                                                                <a href="{{ url('shop-list/'. $subGroup->slug) }}"></a>

                                                            </h5>
                                                            <ul class="nav-category-inner-list H-submenu" style="display: none">
                                                                @foreach($subGroup->categories as $cat)
                                                                    <li><a href="{{ url('shop-list/'. $cat->slug) }}">
                                                                        </a>
                                                                        @if($cat->description)
                                                                        @endif
                                                                    </li>
                                                                    @php
                                                                        $cat_counter++;  //Increase the counter value by 1
                                                                    @endphp
                                                                @endforeach
                                                            </ul>
                                                            @endforeach
                                                        </div> <!-- /.col-md-6 -->
                                                    </div><!-- /.row -->
                                                </div><!-- /.category-section-content -->
                                            </div><!-- /.category-section-inner -->

                                            @if($catGroup->images->first() && Storage::exists($catGroup->images->first()->path))
                                                {{--                                        <img class="nav-category-section-bg-img" src="{{ get_storage_file_url(optional($catGroup->images->first())->path, 'full') }}" alt="{{ $catGroup->name }}" title="{{ $catGroup->name }}"/>--}}
                                            @endif
                                        </div><!-- /.category-section -->
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="right-content">
{{--                        @foreach($all_categories as $catGroup)--}}
{{--                            @foreach($subGroup->categories as $cat)--}}
{{--                                <div class="row">--}}
{{--                                    <h3>{{ $catGroup->id }}-{{ $catGroup->slug }}</h3>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}

                        @foreach($shops as $shop)
                            @if(true)
                                <div class="row company-list">
                                    <div class="col-md-3 nopadding-left text-center">
                                        <div class="space20"></div>
                                        <a href="{{ url('shop/'. $shop->slug) }}">
                                            @if(isset($shop->image))
                                                <img src="{{ get_storage_file_url($shop->image->path, 'full') }}" class="brand-logo shop-logo img-responsive" alt="Company Name" title="Company Name" >
                                            @else
                                                <img src="https://placehold.it/140x60/eee?text=No Logo" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ url('shop/'. $shop->slug) }}"><h3>{{ $shop->name }}</h3></a>
                                        <div class="space10"></div>
                                        <p>{!! $shop->description !!}</p>
                                        <div class="space20"></div>
                                        <button type="submit" class='btn btn-primary btn flat'>Chat Now</button>
                                    </div>
                                </div>
                                <div class="space20"></div>
                            @endif
                        @endforeach
                    </div>

                    <div class="text-center">
                        {{ $shops->links('layouts.pagination')}}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    a:hover, a:focus {
        color: #FF0002;
    }
    .shop-logo {
        max-height: 120px;
        margin: 0 auto;
    }
    .copyright-text {
        margin-left: 20px;
    }

    .company-list {
        padding: 20px;
        border: 1px solid #eee;
        background: #fff;
    }

    .company-list h3 {
        color: #FF0002;
    }

    .company-list p {
        word-break: break-all;
    }

    .cate-head {
        padding-left: 24px;
        text-transform: uppercase;
        color: #FF0002;
    }

    .left-side-category {
        display: flex;
        flex-flow: row wrap;
    }

    .left-side-category::before {
        display: block;
    }

    .left-side-category .col-md-3, .left-side-category .col-md-9 {
        padding-left: 30px;
        padding-right: 7.5px;
        padding-right: 0;
    }

    .left-side-category-inner {
        /*background-color: #fff;*/
        /*border-radius: 10px;*/
    }

    .category-menu {
        margin-bottom: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
        background: #fff;
    }

    .row category-grid {
        padding: 0 20px;
    }

    .Horizontal-Menu {
        padding: 0 40px;
        margin: 0;
        list-style: none;
    }
    Horizontal-Menu hr {
        padding-left: 20px;
        padding-right: 20px;
        margin-top: 0;
    }

    .H-submenu {
        padding: 0;
        margin: 0;
        visibility: hidden;
        height: 0;
        overflow: hidden;
        opacity: 0;
    }

    .Horizontal-Menu h3 {
        color: #707070;
        margin-top: 10px;
    }

    .Horizontal-Menu li {
        height: 50px;
        text-align: left;
        font-size: 12px;
        font-weight: bold;
        position: relative;
    }

    .Horizontal-Menu li a {
        text-decoration: none;
        color: #707070;
        text-transform: uppercase;
    }

    .Horizontal-Menu li a:hover {
        text-decoration: none;
        color: #FF0002;
    }

    .Horizontal-Menu li:hover {
        transition: all 2s ease-in-out;
        -webkit-transition: all 2s ease-in-out;
    }

    .H-submenu li {
        padding: 0 20px;
    }

    .H-submenu li:hover {
    }

    .Horizontal-Menu li:hover .H-submenu {
        visibility: visible;
        height: auto;
        transition: all 2s ease-in-out;
        -webkit-transition: all 2s ease-in-out;
        left: 100%;
        top: 0px;
        list-style: none;
        opacity: 1;
    }

    .H-submenu li {
        height: 20px;
    }

    .V-submenu li {
        border-bottom: 1px solid #232323 !important;
    }

    .V-submenu li:hover {
    }

    .V-submenu li {
        font-size: 10px !important;
        float: none !important;
    }

    .category-section {
        /*position: absolute;*/
        top: 0;
        left: 270px;
        padding-left: 0;
        padding-right: 0;
    }

    .category-section-inner {
        padding: 10px 20px;
    }

    .left-side-category .col-md-3 {
        padding-left: 0;
        padding-right: 0;
    }
    .menu-category-dropdown > li > a:after {
        content: '';
    }
    .menu-category-dropdown > li > a {
        padding-left: 0 !important;
    }

</style>
<style>
    #content-wrapper {
        background: linear-gradient(180deg, #F7D121 50%, #EAEAEA 50%);
    }

    .blog-section .category-title, .widget-title-sm {
        color: #FF0002;
    }

    .red-underline {
        border-bottom: 3px solid #FF0002;
        padding-bottom: 10px;
        font-width: bold;
        color: #6e6e6e;
    }
    .blog-post-title a {
        color: #FF0002;
    }
    p.blog-post-excerpt {
        font-size: 14px;
    }
    .blog-sidebar-posts a {
        color: #6e6e6e;
    }
    .red-color {
        color: #FF0002;
    }
    .recent-blog-head h6 {
        margin-top: 0;
    }
    .recent-blog-head h6 a {
        color: #FF0002 !important;
        margin-top: 0;
    }
    .recent-blog-head p {
        font-size: 10px;
    }
</style>