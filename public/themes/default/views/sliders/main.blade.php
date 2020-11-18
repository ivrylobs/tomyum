<!-- LEFT CAT -->
<div class="space20"></div>
<div class="row left-side-category">
    <div class="col-md-3 col-xs-12 left-side-category-inner">
        <div class="category-menu">
            <ul class="menu-category-dropdown Horizontal-Menu">
                <h3 class="cate-head">Categories</h3>
                
                @foreach($all_categories as $catGroup)
                    @if($catGroup->subGroups->count())
                        @php
                            $categories_count = $catGroup->subGroups->sum('categories_count');
                            $cat_counter = 0;
                        @endphp

                        <li>
                            <a href="{{ route('categoryGrp.browse', $catGroup->slug) }}">{{ $catGroup->name }}</a>
                            <div class="category-section {{$categories_count > 15 ? 'expanded' : ''}}">
                                <div class="category-section-inner" style="z-index: 99999">
                                    <div class="category-section-content">
                                        <div class="row category-grid">
                                            <div class="col-md-12 border-each">
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
                                                    <a href="{{ route('categories.browse', $subGroup->slug) }}">{{ $subGroup->name }}</a>
                                                </h5>
{{--                                                <ul class="nav-category-inner-list H-submenu" style="display: none">--}}
{{--                                                    @foreach($subGroup->categories as $cat)--}}
{{--                                                        <li><a href="{{ route('category.browse', $cat->slug) }}">--}}
{{--                                                                        {{ $cat->name }}--}}
{{--                                                            </a>--}}
{{--                                                            @if($cat->description)--}}
{{--                                                                    <p>{!! $cat->description !!}</p>--}}
{{--                                                            @endif--}}
{{--                                                        </li>--}}
{{--                                                        @php--}}
{{--                                                            $cat_counter++;  //Increase the counter value by 1--}}
{{--                                                        @endphp--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
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
    <div class="col-md-9 col-xs-12 ei-slider-wrapper">
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
            </ul><!-- ei-slider-large -->

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
        </div><!-- /.ei-slider-->
    </div>
</div>

<style>
    .cate-head {
        padding-left: 24px;
        text-transform: uppercase;
    }
    .left-side-category {
        display: flex;
        flex-flow: row wrap;
    }
    .left-side-category::before {
         display: block;
     }

    .left-side-category .col-md-3, .left-side-category .col-md-9 {
        padding-left: 7.5px;
        padding-right: 7.5px;
        padding-right: 0;
    }
    .left-side-category-inner {
        background-color: #fff;
    }
    .category-menu {
        margin-bottom: 20px;
        margin-top: 30px;
    }
    /*.row .category-grid {*/
    /*    padding: 0 20px;*/
    /*}*/

    .Horizontal-Menu {
        padding: 0;
        margin: 0;
        list-style: none;
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
    }
    .Horizontal-Menu li {
        height: 30px;
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
        position: absolute;
        top: 0;
        left: 270px;
        padding-left: 0;
        padding-right: 0;
        min-width: 400px;
    }
    .category-section-inner {
        padding: 10px 20px;
    }

    .left-side-category .col-md-3{
        padding-left: 0;
        padding-right: 0;
    }
    /*.menu-category-dropdown > li > a:after {*/
    /*    content: '\f0da' !important;*/
    /*}*/
    .border-each .nav-category-inner-title:not(:last-child){
        padding-bottom: 10px;
        border-bottom: 1px solid #BFBFBF;
    }
    .nav-category-inner-title a {
    }
</style>
