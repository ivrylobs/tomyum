<div class="row">
    <div class="col-md-12  bg-white">
        <div class="section-title">
            <div class="row">
                <div class="col-xs-8">
                    <h3 class="text-left text-uppercase section-heading">{!! trans('theme.section_headings.new_arrivals') !!}</h3>
                </div>
                <div class="col-xs-4 text-right show-more">
                    <a href="{{ url('categories') }}">
                        <h5>Show more</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border-heading-red"></div>
                </div>
            </div>
            <div class="space30"></div>
        </div>
        <div class="owl-carousel new-arrival-carousel">
            @foreach($products as $item)
                <div class="product-widget">
                    <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}"
                         data-name="product_image"
                         alt="{{ $item->title }}" title="{{ $item->title }}"/>
                    <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                    <div class="product-info">
                        <h5 class="product-info-title">{!! $item->title !!}</h5>
                        @include('layouts.pricing', ['item' => $item])
{{--                        @include('layouts.ratings-custom', ['ratings' => $item->feedbacks->avg('rating')])--}}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="space10"></div>
    </div><!-- /.col-md-12 -->
</div><!-- /.row -->