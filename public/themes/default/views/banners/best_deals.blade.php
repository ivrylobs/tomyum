@if(isset($banners['best_deals']))

    <div class="section-title"></div>
    <div class="row featured">
        @foreach($banners['best_deals'] as $banner)
            {{--hard code for big first banner--}}
            @if($banner['order'] !== 888)
                @include('layouts.banner', $banner)
            @endif
        @endforeach
    </div><!-- /.row -->

@endif

<style>
    @media (min-width: 992px) {
        .featured .col-md-6:first-child {
            padding-left: 0;
        }

        .featured .col-md-6:last-child {
            padding-right: 0 !important;
        }
    }
</style>