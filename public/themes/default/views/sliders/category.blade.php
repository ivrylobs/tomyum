<!-- LEFT CAT -->
<section>
    <div class="container">
        <div class="space20"></div>

        <div class="row left-side-category">
            <div class="col-md-3 col-xs-12 left-side-category-inner">
                <div class="category-menu">
                    <ul class="menu-category-dropdown Horizontal-Menu">
                        <h3 style="padding-left: 24px;">Categories</h3>
                        @foreach($categoryGroup->subGroups as $catGroup)
                            @if(true)
                                @php
                                    $cat_counter = 0;
                                @endphp

                                <li>
                                    <a href="{{ route('categories.browse', $catGroup->slug) }}">{{ $catGroup->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-xs-12" >
                <div id="ei-slider" class="ei-slider" style="height: 300px">
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
    </div>
</section>


<style>

    .left-side-category {
        display: flex;
        flex-flow: row wrap;
        margin-left: -8px;
    }
    .left-side-category::before {
        display: block;
    }

    .left-side-category .col-md-3, .left-side-category .col-md-9 {
        /*padding-left: 7.5px;*/
        /*padding-right: 7.5px;*/
    }
    .left-side-category-inner {
        background-color: #fff;
        /*border-radius: 10px;*/
    }
    .category-menu {
        margin-bottom: 20px
    }
    .row category-grid {
        padding: 0 20px;
    }

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
    }

    .category-section-inner {
        padding: 10px 20px;
    }

    .left-side-category .col-md-3 {
        padding-left: 0;
        padding-right: 0;
    }

    .ei-slider-large {
        border-radius: 0;
    }

</style>