@php
    $geoip = geoip(request()->ip());
    $shipping_country = $business_areas->where('iso_code', $geoip->iso_code)->first();
    $shipping_state = \DB::table('states')->select('id', 'name', 'iso_code')->where([
        ['country_id', '=', $shipping_country->id], ['iso_code', '=', $geoip->state]
    ])->first();

    //$shipping_zone = get_shipping_zone_of($item->shop_id, $shipping_country->id, optional($shipping_state)->id);
    //$shipping_options = isset($shipping_zone->id) ? getShippingRates($shipping_zone->id) : 'NaN';

    $multiPriceSize = false;
    $hasColor = false;
    $hasSize = false;

    foreach($attributes as $key => $attribute) {
        foreach($attribute->attributeValues as $option) {
            if($option->attribute_id == 8) {
                $multiPriceSize = true;
                break;
            }
        }
    }

    function getNumberFromString($str) {
        preg_match_all('!\d+!', $str, $matches);

        return isset($matches[0][1]) ? $matches[0][1] : $matches[0][0]+1;
    }

@endphp

<section>
    <div class="container">
        <div class="row sc-product-item" id="single-product-wrapper">
            <div class="col-md-5 col-sm-6">
                @include('layouts.jqzoom', ['item' => $item, 'variants' => $variants])
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="product-single">
                            @include('layouts.product_info', ['item' => $item])

                            <div class="space20"></div>
                            <div class="product-info-options space10">
                                <div class="select-box-wrapper">
                                    @if(!$multiPriceSize)
                                        @include('layouts.pricing', ['item' => $item])
                                    @endif

                                    @foreach($attributes as $key => $attribute)
                                        @if($attribute['name'] == 'Amount')
                                            @foreach($attribute->attributeValues as $key => $option)
                                                @if($option->attribute_id == 8)
                                                    <div class="col-md-4 text-center b-color">
                                                        <span id="amount_value_{{$key+1}}" data-amount="{{ getNumberFromString($option->value) }}">{{ $option->value }}</span>
                                                        <div class="space20"></div>
                                                        {{-- <span id="size_price_{{$key+1}}">{!! get_formated_price($variants[$ccc]->sale_price, 0) !!}</span>--}}
                                                        @if(isset($variants[$key]))
                                                            <span id="size_price_{{$key+1}}">{!! floor($variants[$key]->sale_price) !!}</span> ฿
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="row product-attribute">
                                                <div class="space30"></div>

                                                <div class="{{ $attribute->name !== 'Amount' ? 'col-sm-3 col-xs-4': 'd-none' }}  ">
												<span class="info-label" id="attr-{{str_slug($attribute->name)}}">
													{{ $attribute->name }}:
												</span>
                                                </div>
                                                <div class="{{ $attribute->name !== 'Amount' ? 'col-sm-9 col-xs-8 nopadding-left': 'col-xs-12' }} ">
                                                    @foreach($attribute->attributeValues as $key => $option)
                                                        @if($option->attribute_id != 8)

                                                            <div class="row">
                                                                <div class="col-xs-3">
                                                                    <span class="b-color">{{ $option->value }}</span>
                                                                </div>
                                                                <div class="col-xs-9">
                                                                    <div class="product-qty-wrapper">
                                                                        <div class="product-info-qty-item">
                                                                            <button class="product-info-qty product-info-qty-minus">-</button>
                                                                            <input id="product_quantity_{{$key+1}}" class="product-info-qty product-info-qty-input product-info-qty-input-ov" data-name="product_quantity" data-min="0"
                                                                                   data-max="{{ $item->stock_quantity  }}" type="text"
                                                                                   value="1">
                                                                            <button class="product-info-qty product-info-qty-plus">+</button>
                                                                        </div>
                                                                        {{--   <span class="available-qty-count">@lang('theme.stock_count', ['count' => $item->stock_quantity])</span>--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                        @endif
                                        @if($attribute['name'] == 'Colors')
                                            @php $hasColor = true @endphp
                                            <div class="row product-attribute">
                                                <div class="col-sm-3 col-xs-4">
                                                    <span class="info-label info-label-attr" id="attr-{{str_slug($attribute->name)}}">{{ $attribute->name }}:</span>
                                                </div>
                                                <div class="col-sm-9 col-xs-8 nopadding-left">
                                                    <select id="select-color" class="product-attribute-selector {{$attribute->css_classes}}" id="attribute-{{$attribute->id}}" required="required">
                                                        @foreach($attribute->attributeValues as $option)
                                                            <option value="{{ $option->id }}" data-color="{{ $option->color ?? $option->value }}" {{ in_array($option->id, $item_attrs) ? 'selected' : '' }}>{{ $option->value }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                        @endif
                                        @if($attribute['name'] == 'แบบ')
                                            @php $hasColor = true @endphp
                                            <div class="row product-attribute">
                                                <div class="col-sm-3 col-xs-4">
                                                    <span class="info-label info-label-attr" id="attr-{{str_slug($attribute->name)}}">{{ $attribute->name }}:</span>
                                                </div>
                                                <div class="col-sm-9 col-xs-8 nopadding-left">
                                                    <select id="select-model" class="product-attribute-selector {{$attribute->css_classes}}" id="attribute-{{$attribute->id}}" required="required">
                                                        @foreach($attribute->attributeValues as $option)
                                                            <option value="{{ $option->id }}" data-color="{{ $option->color ?? $option->value }}" {{ in_array($option->id, $item_attrs) ? 'selected' : '' }}>{{ $option->value }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                        @endif
                                        @if($attribute['name'] == 'Size')
                                            @php $hasSize = true; @endphp
                                            @foreach($attribute->attributeValues as $key => $option)
                                                @if($option->attribute_id == 8)
                                                    <div class="col-md-4 b-color">
                                                        {{ $option->value }}
                                                        <div class="space20"></div>
                                                        {{-- <span id="size_price_{{$key+1}}">{!! get_formated_price($variants[$ccc]->sale_price, 0) !!}</span>--}}
                                                        @if(isset($variants[$key]))
                                                            <span id="size_price_{{$key+1}}">{!! floor($variants[$key]->sale_price) !!}</span> ฿
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="row product-attribute">
                                                <div class="space30"></div>
                                                <div class="{{ $attribute->name !== 'Amount' ? 'col-sm-3 col-xs-4': 'd-none' }}  ">
                                                    <span class="info-label" id="attr-{{str_slug($attribute->name)}}">{{ $attribute->name }}:</span>
                                                </div>
                                                <div class="{{ $attribute->name !== 'Amount' ? 'col-sm-9 col-xs-8 nopadding-left': 'col-xs-12' }} ">
                                                    @foreach($attribute->attributeValues as $key => $option)
                                                        @if($option->attribute_id != 8)

                                                            <div class="row">
                                                                <div class="col-xs-3">
                                                                    <span class="b-color">{{ $option->value }}</span>
                                                                </div>
                                                                <div class="col-xs-9">
                                                                    <div class="product-qty-wrapper">
                                                                        <div class="product-info-qty-item">
                                                                            <button class="product-info-qty product-info-qty-minus">-</button>
                                                                            <input id="product_quantity_{{$key+1}}" class="product-info-qty product-info-qty-input product-info-qty-input-ov" data-name="product_quantity" data-min="0"
                                                                                   data-max="{{ $item->stock_quantity  }}" type="text"
                                                                                   value="1">
                                                                            <button class="product-info-qty product-info-qty-plus">+</button>
                                                                        </div>
                                                                        {{--   <span class="available-qty-count">@lang('theme.stock_count', ['count' => $item->stock_quantity])</span>--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        @endif


                                    @endforeach
                                    @if($hasSize == false && count($attributes))
                                        <div class="row product-attribute">
                                            <div class="space30"></div>
                                            <div class="col-sm-3 col-xs-4">
                                                <span class="info-label" id="attr-1">Quantity:</span>
                                            </div>
                                            <div class="col-sm-9 col-xs-8 nopadding-left">

                                                <div class="product-qty-wrapper">
                                                    <div class="product-info-qty-item">
                                                        <button class="product-info-qty product-info-qty-minus">-</button>
                                                        <input id="product_quantity_1" class="product-info-qty product-info-qty-input product-info-qty-input-ov" data-name="product_quantity" data-min="0"
                                                               data-max="{{ $item->stock_quantity  }}" type="text"
                                                               value="1">
                                                        <button class="product-info-qty product-info-qty-plus">+</button>
                                                    </div>
                                                    {{--   <span class="available-qty-count">@lang('theme.stock_count', ['count' => $item->stock_quantity])</span>--}}

                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div id="calculation-section" style="display:{{ $multiPriceSize ? 'none': 'initial' }} ">
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-4">
                                            <span class="info-label qtt-label">@lang('theme.quantity'):</span>
                                        </div>
                                        <div class="col-sm-9 col-xs-8 nopadding">
                                            <div class="product-qty-wrapper">
                                                <div class="product-info-qty-item">
                                                    <button class="product-info-qty product-info-qty-minus">-</button>
                                                    <input id="product_quantity_1" class="product-info-qty product-info-qty-input" data-name="product_quantity" data-min="{{$item->min_order_quantity}}" data-max="{{$item->stock_quantity}}"
                                                           type="text" value="1">
                                                    <button class="product-info-qty product-info-qty-plus">+</button>
                                                </div>
                                                {{--												<span class="available-qty-count">@lang('theme.stock_count', ['count' => $item->stock_quantity])</span>--}}
                                            </div>
                                        </div>
                                    </div>

                                    {{--									<div class="row" id="order-total-row">--}}
                                    {{--										<div class="col-sm-3 col-xs-4">--}}
                                    {{--											<span class="info-label">@lang('theme.total'):</span>--}}
                                    {{--										</div>--}}
                                    {{--										<div class="col-sm-9 col-xs-8 nopadding">--}}
                                    {{--											<span id="summary-total" class="text-muted">{{ trans('theme.notify.will_calculated_on_select') }}</span>--}}
                                    {{--										</div>--}}
                                    {{--									</div>--}}
                                </div>
                            </div><!-- /.product-option -->

                            <div class="sep"></div>

                            <div class="space20"></div>

                            <a href="{{ route('direct.checkout', $item->slug) }}" class="btn btn-lg btn-warning flat btn-buy-now" disabled="disabled" id="buy-now-btn"><i class="fa fa-rocket"></i> @lang('theme.button.buy_now')</a>
                            <span class="available-qty-count"> ({{ number_format($item->stock_quantity, 0) }} pieces available)</span>

                        </div><!-- /.product-single -->
                    </div>

                    <div class="col-md-12 nopadding-right">
                        {{-- <a data-link="{{ route('cart.addItem', $item->slug) }}" class="btn btn-primary btn-lg btn-block flat space10 sc-add-to-cart">--}}
                        {{-- <i class="fa fa-shopping-bag"></i> @lang('theme.button.add_to_cart')--}}
                        {{-- </a>--}}
                        <div class="clearfix space30"></div>
                        @include('layouts.share_btns')
                    </div>
                    <div class="space20"></div>

                </div>

			</div>
			<div class="col-md-3 col-sm-6">
				@if(count($attributes) > 0)
					@php $check = true @endphp
					@foreach($attributes as $attribute)
						<div class="row product-attribute">
							<div class="space30"></div>
							@if($attribute->name == 'Size' && $check)
								@foreach($attribute->attributeValues as $key => $option)
									<div class="col-md-8">
										<h5 class="">
{{--											<span style="display: none"><span class="pattern-type"></span> <span class="color-selected"> </span>, </span>--}}
                                            <span class="detail"></span>
											<span>{{ $attribute->name . ' ' . $option->value }} จำนวน <span id="sum_amount_{{ $key + 1 }}"></span> ชิ้น</span>
										</h5>
									</div>
									<div class="col-md-4 text-right"><h5><span class="b-color sum-size" id="sum_size_{{ $key+1 }}"></span> ฿</h5></div>
								@endforeach
								<div class="space30"></div>
								<hr>
								<div class="col-md-8">
									<h5>Total</h5>
								</div>
								<div class="col-md-4 text-right"><h5><span class="b-color" id="total-price"></span> ฿</h5></div>
								@php $check = false @endphp
							@endif

                            @if($attribute->name == 'Colors' && $check && !$hasSize)
                                <div class="col-md-8">
                                    <h5 class="">
										<span class="detail"></span> จำนวน <span id="sum_amount_1"></span> ชิ้น
                                    </h5>
                                </div>
                                <div class="col-md-4 text-right"><h5><span class="b-color sum-size" id="sum_size_1"></span> ฿</h5></div>
                                <div class="space30"></div>
                                <hr>
                                <div class="col-md-8">
                                    <h5>Total</h5>
                                </div>
                                <div class="col-md-4 text-right"><h5><span class="b-color" id="total-price"></span> ฿</h5></div>
                                @php $check = false @endphp
                            @endif

                            @if($attribute->name == 'Amount' && $check && !$hasSize)
                                <div class="col-md-8">
                                    <h5 class="">
										<span class="detail"></span> จำนวน <span id="sum_amount_1"></span> ชิ้น
                                    </h5>
                                </div>
                                <div class="col-md-4 text-right"><h5><span class="b-color sum-size" id="sum_size_1"></span> ฿</h5></div>
                                <div class="space30"></div>
                                <hr>
                                <div class="col-md-8">
                                    <h5>Total</h5>
                                </div>
                                <div class="col-md-4 text-right"><h5><span class="b-color" id="total-price"></span> ฿</h5></div>
                                @php $check = false @endphp
                            @endif

                        </div>
                    @endforeach
                @else
                    <div class="row product-attribute">
                        <div class="space30"></div>
                        <div class="col-md-8">
                            <h5><span class="detail"></span> จำนวน <span id="sum_amount_1"></span> ชิ้น</h5>
                        </div>
                        <div class="col-md-4 text-right"><h5><span class="b-color sum-size" id="sum_size_1"></span> ฿</h5></div>
                        <div class="space30"></div>
                        <hr>
                        <div class="col-md-8">
                            <h5>Total</h5>
                        </div>
                        <div class="col-md-4 text-right"><h5><span class="b-color" id="total-price"></span> ฿</h5></div>
                    </div>
                @endif
                <div class="col-md-12" id="chat-box">
                    <div class="chat-box-content text-center">
                        <div class="space50"></div>
                        <div class="seller-info space30">
                            <img src="{{ get_storage_file_url(optional($item->shop->image)->path, 'small') }}" class="seller-info-logo img-sm" alt="{{ trans('theme.logo') }}">
                            <a href="{{ url('shop/'. $item->shop->slug) }}" class="seller-info-name">
                                {!! $item->shop->getQualifiedName() !!}
                            </a>
                            <div class="space20"></div>

                            <button class="btn btn-chat-now" onclick="openForm()">Chat Now</button>

                            <div class="chat-popup" id="myForm">
                                <form action="/action_page.php" class="form-container">
                                    <h3>Chat</h1>

                                    <label for="msg"><b>Message</b></label>
                                    <textarea placeholder="Type message.." name="msg" required></textarea>

                                    <button type="submit" class="btn">Send</button>
                                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.1/socket.io.js" integrity="sha512-vGcPDqyonHb0c11UofnOKdSAt5zYRpKI4ow+v6hat4i96b7nHSn8PQyk0sT5L9RECyksp+SztCPP6bqeeGaRKg==" crossorigin="anonymous"></script>
<script>
    (function connect() {
        let socket = io.connect("https://api.ivrylobs.xyz")
        console.log("Function initialized")
    })();

    function openForm() {
    document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
    document.getElementById("myForm").style.display = "none";
    }
</script>

<style>

    /* The popup chat - hidden by default */
    .chat-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    resize: none;
    min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
    background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
    opacity: 1;
    }

    .b-color {
        color: #0d0d0d;
    }

    #chat-box {
        margin-top: 30px;
        width: 100%;
        height: 200px;
        background: #eee;
    }

    #chat-box .chat-box-content {
        margin: 0 auto;
    }

    #chat-box a {
        color: #000;
    }

    #chat-box .seller-info-logo {
        max-width: 30px;
    }

    .seller-info-name {
        font-size: 24px;
    }

    h5 {
        font-weight: 100;
        color: #545454;
    }
</style>
<div class="clearfix space20"></div>

<section id="item-desc-section">
    <div class="container">
        <div class="row">
            {{--      		@if($linked_items->count())--}}
            {{--		        <div class="col-md-3 bg-light nopadding-right nopadding-left">--}}
            {{--			        <div class="section-title">--}}
            {{--			          <p class="">@lang('theme.section_headings.bought_together'): </p>--}}
            {{--			        </div>--}}
            {{--					<ul class="sidebar-product-list">--}}
            {{--					    @foreach($linked_items as $linkedItem)--}}
            {{--					        <li class="sc-product-item">--}}
            {{--					            <div class="product-widget">--}}
            {{--					                <div class="product-img-wrap">--}}
            {{--					                    <img class="product-img" src="{{ get_inventory_img_src($linkedItem, 'small') }}" alt="{{ $linkedItem->title }}" title="{{ $linkedItem->title }}" />--}}
            {{--					                </div>--}}
            {{--					                <div class="product-info space10">--}}
            {{--					                    @include('layouts.ratings', ['ratings' => $linkedItem->feedbacks->avg('rating')])--}}

            {{--					                    <a href="{{ route('show.product', $linkedItem->slug) }}" class="product-info-title" data-name="product_name">{{ $linkedItem->title }}</a>--}}

            {{--					                    @include('layouts.pricing', ['item' => $linkedItem])--}}
            {{--					                </div>--}}

            {{--					            </div>--}}
            {{--					        </li>--}}
            {{--					    @endforeach--}}
            {{--					</ul>--}}
            {{--		        </div><!-- /.col-md-2 -->--}}
            {{--	        @endif--}}

            {{--	        <div class="col-md-{{$linked_items->count() ? '9' : '12'}}" id="product_desc_section">--}}
            <div class="col-md-12" id="product_desc_section">
                <div role="tabpanel product-list-description">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#desc_tab" aria-controls="desc_tab" role="tab" data-toggle="tab" aria-expanded="true">Product Description</a>
                        </li>
                        <li role="presentation">
                            <a href="#seller_desc_tab" aria-controls="seller_desc_tab" role="tab" data-toggle="tab" aria-expanded="false">Seller Specifications</a>
                        </li>
                        {{--						<li role="presentation">--}}
                        {{--							<a href="#reviews_tab" aria-controls="reviews_tab" role="tab" data-toggle="tab" aria-expanded="false">@lang('theme.customer_reviews')</a>--}}
                        {{--						</li>--}}
                    </ul><!-- /.nav-tab -->

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="desc_tab">

                            {!! $item->product->description !!}

                            <div class="clearfix space30"></div>

                            <hr class="style4 muted"/>

                            <h4>{{ trans('theme.technical_details') }}: </h4>

                            <table class="table table-striped noborder">
                                <tbody>
                                @if($item->product->brand)
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ trans('theme.brand') }}:</th>
                                        <td class="noborder" style="width: 75%;">{{ $item->product->brand }}</td>
                                    </tr>
                                @endif

                                @if($item->product->model_number)
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ trans('theme.model_number') }}:</th>
                                        <td class="noborder" style="width: 75%;">{{ $item->product->model_number }}</td>
                                    </tr>
                                @endif

                                @if($item->product->gtin_type && $item->product->gtin )
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ $item->product->gtin_type }}:</th>
                                        <td class="noborder" style="width: 75%;">{{ $item->product->gtin }}</td>
                                    </tr>
                                @endif

                                @if($item->product->mpn)
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ trans('theme.mpn') }}:</th>
                                        <td class="noborder" style="width: 75%;">{{ $item->product->mpn }}</td>
                                    </tr>
                                @endif

                                @if($item->sku)
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ trans('theme.sku') }}:</th>
                                        <td class="noborder" id="item_sku" style="width: 75%;">{{ $item->sku }}</td>
                                    </tr>
                                @endif

                                @if(optional($item->product->manufacturer)->name)
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ trans('theme.manufacturer') }}:</th>
                                        <td class="noborder" style="width: 75%;">{{ $item->product->manufacturer->name }}</td>
                                    </tr>
                                @endif

                                @if($item->product->origin)
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ trans('theme.origin') }}:</th>
                                        <td class="noborder" style="width: 75%;">{{ $item->product->origin->name }}</td>
                                    </tr>
                                @endif

                                @if($item->min_order_quantity)
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ trans('theme.min_order_quantity') }}:</th>
                                        <td class="noborder" id="item_min_order_qtt" style="width: 75%;">{{ $item->min_order_quantity }}</td>
                                    </tr>
                                @endif

                                @if($item->shipping_weight)
                                    <tr class="noborder">
                                        <th class="text-right noborder">{{ trans('theme.shipping_weight') }}:</th>
                                        <td class="noborder" id="item_shipping_weight" style="width: 75%;">{{ $item->shipping_weight . ' ' . config('system_settings.weight_unit') }}</td>
                                    </tr>
                                @endif

                                <tr class="noborder">
                                    <th class="text-right noborder">{{ trans('theme.first_listed_on', ['platform' => get_platform_title()]) }}:</th>
                                    <td class="noborder" style="width: 75%;">{{ $item->product->created_at->toFormattedDateString() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="seller_desc_tab">

                            <div id="seller_seller_desc">
                                {!! $item->description !!}
                            </div>

                            @if($item->shop->config->show_shop_desc_with_listing)
                                @if($item->description)
                                    <br/><br/>
                                    <hr class="style4 muted"/>
                                @endif
                                <br/>
                                <h4>{{ trans('theme.seller_info') }}: </h4>
                                {!! $item->shop->description !!}
                            @endif

                            @if($item->shop->config->show_refund_policy_with_listing && $item->shop->config->return_refund)
                                <br/><br/>
                                <hr class="style4 muted"/><br/>

                                <h4>{{ trans('theme.return_and_refund_policy') }}: </h4>
                                {!! $item->shop->config->return_refund !!}
                            @endif
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="reviews_tab">
                            <div class="reviews-tab">
                                @forelse($item->feedbacks->sortByDesc('created_at') as $feedback)
                                    <p>
                                        <b>{{ $feedback->customer->getName() }}</b>

                                        <span class="pull-right small">
											<b class="text-success">@lang('theme.verified_purchase')</b>
											<span class="text-muted"> | {{ $feedback->created_at->diffForHumans() }}</span>
										</span>
                                    </p>

                                    <p>{{ $feedback->comment }}</p>

                                    @include('layouts.ratings', ['ratings' => $feedback->rating])

                                    @unless($loop->last)
                                        <div class="sep"></div>
                                    @endunless
                                @empty
                                    <div class="space20"></div>
                                    <p class="lead text-center text-muted">@lang('theme.no_reviews')</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix space20"></div>

<style>
    .d-none {
        display: none;
    }

    .product-list-description .nav-tabs li:nth-child(1) {
        margin-right: 20px;
    }

    .nav-tabs > li a {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .nav-tabs > li.active > a {
        background: #ff0003;
        color: #fff;
        padding: 18px 50px;
    }

    .nav-tabs > li.active > a:hover {
        background: #ff0003;
        color: #fff;
        padding: 18px 50px;
    }

    .btn-buy-now, .btn-chat-now {
        background-color: #ff0003;
        color: #fff;
        border: none;
        padding: 15px 20px;
        border-radius: 0;
    }

    .product-attribute-selector {
        margin-right: 10px;
        padding: 5px 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .selectboxit-list > .selectboxit-focus > .selectboxit-option-anchor {
        background-color: #FF0002;
    }
</style>

