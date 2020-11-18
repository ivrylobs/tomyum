<section>
    <div class="container-fluid" style="background-color: #fff">
        <div class="space50"></div>
        <h1 class="category-title text-center text-uppercase">All Product</h1>
        <div class="space50"></div>
    </div>
    <div class="container">

        <div class="section-title space20">
            <div class="row">
                <div class="col-md-12">
                    <h6 style="color:#fff;margin-left: 15px">Home / All Product</h6>
                    <div class="space30"></div>
                    <h2 style="color:#fff;margin-left: 15px">Please select categories</h2>
                    <div class="space30"></div>
                </div>
            </div>
        </div>
        <div class="flex-row row">
            @foreach($all_categories as $categoryGroup)
                @if($categoryGroup->subGroups->count())
                    <div class="col-md-3 col-sm-6 category-widget space30">
                        <div class="thumbnail-o">
                            <section class="category-banner-img-wrapper">
                                <div >
                                    <a href="{{ url('categorygrp/'. $categoryGroup->slug) }}">
                                        <img src="{{ get_cover_img_src($categoryGroup, 'category') }}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </section>
                            <section class="bg-light">
                                <div class="cate-name">
                                    <a href="{{ url('categorygrp/'. $categoryGroup->slug) }}">
                                        <span class="lead">{{ $categoryGroup->name }}</span>
                                    </a>
                                </div>
                                <div class="space10"></div>

{{--                                <ul class="category-list">--}}
{{--                                    @foreach($categoryGroup->subGroups as $subGroup)--}}
{{--                                        <li class="nav-category-inner-title">--}}
{{--                                            <a href="{{ route('categories.browse', $subGroup->slug) }}">{{ $subGroup->name }}</a>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
                            </section>
                        </div>

                    </div><!-- /.col-md-3 -->
                    @if($loop->iteration % 4 == 0)
                        <div class="clearfix"></div>
                    @endif
                    @if($loop->iteration % 2 == 0)
                    <!-- Add clearfix for only the sm viewport -->
                        <div class="clearfix visible-sm-block"></div>
                    @endif
                @endif
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.container -->

</section>

<style>
    .cate-name {
        text-align: center;
    }
    .cate-name a {
        text-decoration: none;
    }
    #content-wrapper {
        min-height: 380px;
        background: rgb(237,48,36);
        background: linear-gradient(to bottom,
        rgba(237,48,36,1) 3%,
        rgba(244,117,36,1) 13%,
        rgba(249,164,36,1) 21%,
        rgba(249,170,51,1) 29%,
        rgba(251,191,102,1) 38%,
        #F7D121 70%,
        rgba(255,255,255,1) 70%);
    }

    .category-widget .banner {
        height: 300px !important;
    }

    .banner-o-hid {
        border-radius: 0;
        border: 0;
    }

    .bg-light {
        padding: 20px 10px;
    }

    .category-title {
        font-weight: bold;
        color: #FF0002;
    }

    .category-list li {
        list-style: initial !important;
        margin-left: 30px;
        color: #707070;
    }

    .category-list .nav-category-inner-title a {
        color: #707070 !important;
    }

    .nav-category-inner-title, .nav-category-inner-title a {
        line-height: 2;
    }

    .lead {
        color: #707070;
        margin-left: 10px;
        font-size: 16px;
    }

    @media only screen and (min-width: 481px) {
        .flex-row.row {
            display: flex;
            flex-wrap: wrap;
        }

        .flex-row.row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }

        .flex-row.row:after,
        .flex-row.row:before {
            display: flex;
        }

        .flex-row.row > [class*='col-'] > .box {
            display: flex;
            flex: 1;
        }
    }


    /* Grow thumbnails to fill columns height */
    .flex-row .thumbnail-o,
    .flex-row .caption {
        display: flex;
        flex: 1 0 auto;
        flex-direction: column;
    }

    /* Flex Grow Text Container */
    .flex-row .caption p.flex-text {
        flex-grow: 1;
    }

    /* Flex Responsive Image */
    .flex-row img {
        width: 100%;
        height: auto;
    }


    /* EXAMPLE 2 - CSS TABLES EQUAL HEIGHT
       - ie9 support
       - not responsive (mobile fallback)
    */

    .table-row.row,
    .table-row-equal {
        display: table;
        width: 100%;
        table-layout: fixed;
        word-wrap: break-word;
    }

    .table-row.row [class*="col-"] {
        width: 25%;
    }

    .thumbnail-o {
        background: #fafafa;
    }

    .table-row.row [class*="col-"],
    .table-row-equal .thumbnail-o {
        float: none;
        display: table-cell;
        vertical-align: top;
    }

    .table-row-equal {
        border-spacing: 30px 0px;
    }

    .table-row-equal .thumbnail-o {
        width: 1%;
    }

    /* mobile fallback to support partial responsiveness */
    @media only screen and (max-width: 480px) {
        .table-row-equal .thumbnail-o {
            display: block;
            width: 100%;
        }
    }



</style>