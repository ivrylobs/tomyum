<div class="product-info">
    <div class="row">
        <div class="col-sm-6 col-xs-12 nopadding-right">
            <div class="product-info-availability space10">
                @if($item->stock_quantity > 0)
                    <button class="btn-in-stock"><i class="fa fa-check-circle-o"></i> {{ trans('theme.in_stock') }}</button>
                @else
                    <button class="btn btn-out-stock"><i class="fa fa-close"></i> {{ trans('theme.out_of_stock') }}</button>
                @endif
            </div>
        </div>
        <div class="col-sm-6 col-xs-12 nopadding-left">
            <div class="product-info-condition space10">
                {{--  @lang('theme.condition'): <span><b id="item_condition">{!! $item->condition !!}</b></span>--}}
                {{--  @if($item->condition_note)--}}
                {{--   <sup><i class="fa fa-question" id="item_condition_note" data-toggle="tooltip" title="{!! $item->condition_note !!}" data-placement="top"></i></sup>--}}
                {{--   @endif--}}
            </div>
        </div>
    </div>

    <style>
        .btn-in-stock {
            background: #00B027;
        }
        .btn-out-stock {
            background: #ff0003;
        }
        .btn-in-stock, .btn-out-stock {
            padding: 5px 15px;
            border: none;
            color: #fff;
        }
    </style>

{{--    @if($item->product->manufacturer->slug)--}}
{{--        <a href="{{ route('show.brand', $item->product->manufacturer->slug) }}"--}}
{{--           class="product-info-seller-name">{!! $item->product->manufacturer->name !!}</a>--}}
{{--    @else--}}
{{--        <a href="{{ route('show.store', $item->shop->slug) }}" class="product-info-seller-name">--}}
{{--            {!! $item->shop->getQualifiedName() !!}--}}
{{--        </a>--}}
{{--    @endif--}}

    <h5 class="product-info-title space10" style="font-size:24px" data-name="product_name">{!! $item->title !!}</h5>
    <div class="space30"></div>
    <p>{!! $item->description !!}</p>
    <hr>
    {{--    @include('layouts.ratings', ['ratings' => $item->feedbacks->avg('rating'), 'count' => $item->feedbacks_count])--}}


    <div class="row">
        <div class="col-sm-3 col-xs-12 nopadding-right">
            <a href="{{ route('wishlist.add', $item) }}" class="btn btn-link">
                <i class="fa fa-heart-o"></i> @lang('theme.button.add_to_wishlist')
            </a>
        </div>
        <div class="col-sm-3 col-xs-12 nopadding-left">
            <a href="javascript:void(0);" class="btn btn-link" data-toggle="modal"
               data-target="{{ Auth::guard('customer')->check() ? "#contactSellerModal" : "#loginModal" }}">
{{--                <i class="fa fa-envelope-o"></i> @lang('theme.button.contact_seller')--}}
            </a>
        </div>
    </div><!-- /.row -->
</div><!-- /.product-info -->

