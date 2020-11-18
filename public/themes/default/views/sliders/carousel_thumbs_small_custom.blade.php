<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <div class="space50"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="text-left text-uppercase section-heading" style="color:#ED3024">Recently</h3>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="border-heading-red"></div>
                    </div>
                </div>
                <div class="space30"></div>
            </div>
            <div class="row row-box">
                <div class="owl-carousel product-carousel">
                    @foreach($products as $item)
                        <div class="product-widget">
                            <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}"
                                 data-name="product_image"
                                 alt="{{ $item->title }}" title="{{ $item->title }}"/>
                            <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
                            <div class="product-info">
                                <h5 class="product-info-title">{!! $item->title !!}</h5>
                                @include('layouts.pricing', ['item' => $item])
                                @include('layouts.ratings-custom', ['ratings' => $item->feedbacks->avg('rating')])
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
