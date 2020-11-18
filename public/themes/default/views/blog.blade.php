@extends('layouts.main')

@section('content')
    <!-- Blog COVER IMAGE -->
    @include('banners.blog_cover')

    <!-- CONTENT SECTION -->

    @includeWhen(isset($blogs), 'contents.blog_page')

    @includeWhen(isset($blog), 'contents.blog_single')
@endsection

<style>
    #content-wrapper {
        background: #fff;
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