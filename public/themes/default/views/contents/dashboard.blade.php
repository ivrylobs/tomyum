<div class="row">

{{--        {{ dd($dashboard) }}--}}
    <div class="col-xs-12">
        <div class="my-info-container">
            <div class="my-info-box">
                <div class="me-info-block">
                    <div class="my-photo-block">
                        <img src="{{ get_storage_file_url(optional($dashboard->image)->path, 'thumbnail') }}" class="center-block" alt="{{ trans('theme.avatar') }}"/>
                    </div>
                    <div class="my-info">
                        <div class="name">
                        <span>
                            {{ $dashboard->getName() }}
                        </span>
                        <a href="{{ route('account', 'account') }}" class="small indent10"><i class="fa fa-edit" data-toggle="tooltip" data-title="{{ trans('theme.edit_account') }}"></i></a>
                        </div>

                        <div class="messages">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>TH</h6>
                                    <h6>at {{ $dashboard->name }}</h6>
                                    <h6>Email : {{ $dashboard->email }}</h6>
                                </div>
                                <div class="col-md-6">
                                    <h6>&nbsp;</h6>
                                    <h6>Joined {{ date("d-M-Y H:i:s", strtotime($dashboard->created_at)) }}</h6>
                                    <h6>Main Product are</h6>
                                </div>
                            </div>

                            <span>
                          <i class="fa fa-clock-o"></i>
                          {{ trans('theme.member_since') }}: <em>{{ $dashboard->created_at->diffForHumans() }}</em>
                        </span>
                        </div>
                    </div>

                    <div class="pull-right">
                        <div class="row">
                            <div class="col-md-5 text-right">
                                <a href="{{ url('/') }}" class="btn btn-primary flat">
                                    <i class="fa fa-shopping-cart"></i> @lang('theme.button.continue_shopping')
                                </a>
                            </div>
                            <div class="col-md-5">
                                @unless($dashboard->shippingAddress)
                                    <a href="{{ route('account', 'account') }}#address-tab" class="btn btn-default flat">
                                        <i class="fa fa-truck"></i> @lang('theme.add_shipping_address')
                                    </a>
                                @endunless
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .my-info-box -->

            <div class="my-info-details">
                <ul>
                    {{--                <li>--}}
                    {{--                    <a href="{{ route('account', 'orders') }}">--}}
                    {{--                        <span class="v">{{ $dashboard->orders_count }}</span>--}}
{{--                        <span class="d"><i class="fa fa-shopping-cart"></i> @lang('theme.orders')</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('account', 'wishlist') }}">
                        <span class="v">{{ $dashboard->wishlists_count }}</span>
                        <span class="d"><i class="fa fa-heart"></i> @lang('theme.wishlist')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('account', 'messages') }}">
                        <span class="v">{{ $dashboard->messages_count }}</span>
                        <span class="d"><i class="fa fa-envelope"></i> @lang('theme.unread_messages')</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{ route('account', 'coupons') }}">--}}
{{--                        <span class="v">{{ $dashboard->coupons_count }}</span>--}}
{{--                        <span class="d"><i class="fa fa-tags"></i> @lang('theme.coupons')</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="last">
                    <a href="{{ route('account', 'disputes') }}">
                        <span class="v">{{ $dashboard->disputes_count }}</span>
                        <span class="d"><i class="fa fa-envelope"></i> @lang('theme.disputes')</span>
                    </a>
                </li>
            </ul>
        </div><!-- .my-info-details -->
    </div><!-- .my-info-container -->
  </div><!-- .col-sm-12 -->
</div><!-- .row -->

{{--<div class="row">--}}
{{--  <div class="col-md-6 nopadding-right">--}}
{{--    <table class="table table-bordered">--}}
{{--      <thead>--}}
{{--        <tr class="text-muted">--}}
{{--          <th>{{ trans('theme.date')}}</th>--}}
{{--          <th>--}}
{{--            {{ trans('theme.orders')}}--}}
{{--            <i class="fa fa-question-circle pull-right" data-toggle="tooltip" data-title="{{ trans('theme.item_count')}}"></i>--}}
{{--          </th>--}}
{{--          <th>{{ trans('theme.amount')}}</th>--}}
{{--        </tr>--}}
{{--      </thead>--}}
{{--      <tbody>--}}
{{--        @foreach($dashboard->orders as $order)--}}
{{--          <tr>--}}
{{--            <td>{!! $order->created_at->format('M j') !!}</td>--}}
{{--            <td>--}}
{{--              <img src="{{ get_storage_file_url(optional($order->shop->image)->path, 'tiny_thumb') }}" class="img-circle" alt="{{ $order->shop->name }}" data-toggle="tooltip" data-title="{{ $order->shop->name }}">--}}
{{--              <a href="{{ route('order.detail', $order) }}">--}}
{{--                {!! $order->order_number !!}--}}
{{--              </a>--}}
{{--              <small class="indent10">{!! $order->orderStatus() !!}</small>--}}
{{--              <span class="label label-outline pull-right"> {{ $order->item_count }} </span>--}}
{{--            </td>--}}
{{--            <td>{!! get_formated_price($order->grand_total, 2) !!}</td>--}}
{{--          </tr>--}}
{{--        @endforeach--}}
{{--      </tbody>--}}
{{--    </table>--}}
{{--  </div><!-- .col-sm-6 -->--}}
{{--  <div class="col-md-6 nopadding-left">--}}
{{--    <table class="table table-bordered">--}}
{{--      <thead>--}}
{{--        <tr class="text-muted">--}}
{{--          <th>{{ trans('theme.wishlist')}}</th>--}}
{{--          <th></th>--}}
{{--        </tr>--}}
{{--      </thead>--}}
{{--      <tbody>--}}
{{--        @foreach($dashboard->wishlists as $wish)--}}
{{--          <tr>--}}
{{--            <td>--}}
{{--              <img class="" src="{{ get_product_img_src($wish->inventory, 'tiny') }}" alt="{!! $wish->inventory->title !!}" title="{!! $wish->inventory->title !!}" />--}}

{{--              <a class="product-link" href="{{ route('show.product', $wish->inventory->slug) }}">{!! str_limit($wish->inventory->title, 35) !!}</a>--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <a class="btn btn-primary btn-xs flat" href="{{ route('direct.checkout', $wish->inventory->slug) }}">--}}
{{--                    <i class="fa fa-rocket"></i> @lang('theme.button.buy_now')--}}
{{--                </a>--}}
{{--            </td>--}}
{{--          </tr>--}}
{{--        @endforeach--}}
{{--      </tbody>--}}
{{--    </table>--}}
{{--  </div><!-- .col-sm-6 -->--}}
{{--</div><!-- .row -->--}}

@foreach($dashboard->addresses as $address)

    @if(in_array($address->address_type, ['contact', 'company', 'sourcing']) )
        <div class="my-info-box">
            <div class="col-md-12" style="border: 1px solid #eee">
                <div class="row">
                    <div id="contactInfo">
                        <div class="pull-left">
                            <h4 class="text-capitalize">{{ $address->address_type }} Infomation</h4>
                        </div>
                        <div class="pull-right">
                            {{--                        <h6><a href="#"><i class="fa fa-edit" data-toggle="tooltip" data-title="{{ trans('theme.edit_account') }}"></i> Edit</a></h6>--}}
                            <a href="{{ route('my.address.edit', $address) }}" class="addressForm btn btn-default btn-xs flat pull-right">
                                <i class="fa fa-edit"></i> @lang('theme.edit')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <h5>Email :</h5>
                            </div>
                            <div class="col-md-8">
                                <h5>&nbsp;{{ $address->info_email }}</h5>
                            </div>
                            <div class="col-md-4 text-right">
                                <h5>Alternative Email :</h5>
                            </div>
                            <div class="col-md-8">
                                <h5>&nbsp;{{ $address->info_alt_email }}</h5>
                            </div>
                            <div class="col-md-4 text-right">
                                <h5>Social Links :</h5>
                            </div>
                            <div class="col-md-8">
                                <h5>&nbsp;{{ $address->info_social_link }}</h5>
                            </div>
                        </div>
                        <div class="space20"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <h5>Fax :</h5>
                            </div>
                            <div class="col-md-8">
                                <h5>&nbsp;{{ $address->info_fax }}</h5>
                            </div>
                            <div class="col-md-4 text-right">
                                <h5>Telephone :</h5>
                            </div>
                            <div class="col-md-8">
                                <h5>&nbsp;{{ $address->info_phone }}</h5>
                            </div>
                            <div class="col-md-4 text-right">
                                <h5>Mobile :</h5>
                            </div>
                            <div class="col-md-8">
                                <h5>&nbsp;{{ $address->info_mobile }}</h5>
                            </div>
                        </div>
                        <div class="space20"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix space30"></div>
    @endif
@endforeach


{{--<div class="my-info-box">--}}
{{--    <div class="col-md-12" style="border: 1px solid #eee">--}}
{{--        <div class="row">--}}
{{--            <div id="contactInfo">--}}
{{--                <div class="pull-left">--}}
{{--                    <h4>Company Infomation</h4>--}}
{{--                </div>--}}
{{--                <div class="pull-right">--}}
{{--                    <a href="{{ route('account', 'account') }}" class="small indent10"><i class="fa fa-edit" data-toggle="tooltip" data-title="{{ trans('theme.edit_account') }}"></i> Edit</a>--}}
{{--                    <a href="{{ route('my.address.edit', $address) }}" class="addressForm btn btn-default btn-xs flat pull-right" ><i class="fa fa-edit" data-toggle="tooltip" data-title="{{ trans('theme.edit_account') }}"></i> Edit</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Email :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>test@gmail.com</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Alternative Email :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Social Links :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="space20"></div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Fax :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Telephone :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Mobile :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="space20"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
{{--<div class="clearfix space30"></div>--}}

{{--<div class="my-info-box">--}}
{{--    <div class="col-md-12" style="border: 1px solid #eee">--}}
{{--        <div class="row">--}}
{{--            <div id="contactInfo">--}}
{{--                <div class="pull-left">--}}
{{--                    <h4>Sourcing Infomation</h4>--}}
{{--                </div>--}}
{{--                <div class="pull-right">--}}
{{--                    <h6><a href="#"><i class="fa fa-edit" data-toggle="tooltip" data-title="{{ trans('theme.edit_account') }}"></i> Edit</a></h6>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Email :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>test@gmail.com</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Alternative Email :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Social Links :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="space20"></div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Fax :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Telephone :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4 text-right">--}}
{{--                        <h5>Mobile :</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8">--}}
{{--                        <h5>None</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="space20"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
{{--<div class="clearfix space50"></div>--}}

<style>
    #contactInfo {
        padding: 10px 20px;
        display: block;
    }

    @media (max-width: 768px) {
        .me-info-block .pull-right {
            margin-top: 30px;
            margin-bottom: 5px;
        }
    }

    .my-info-box h5 {
        margin-bottom: 0;
    }

    .my-info-container .me-info-block {
        height: 130px;
    }

    .my-info-container .my-info, .messages {
        width: 400px;
    }
</style>