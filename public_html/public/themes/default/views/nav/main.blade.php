<nav class="navbar navbar-default navbar-main navbar-light navbar-top">
  <div class="container">
    <div class="navbar-header brand-centered">
      <a class="navbar-brand" href="{{ url('/') }}">
        @if( Storage::exists('logo@2x.png') )
          <img src="{{ get_storage_file_url('logo@2x.png', 'full') }}" class="brand-logo" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}">
        @else
          <img src="https://placehold.it/140x60/eee?text={{ get_platform_title() }}" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}" />
        @endif
      </a>
    </div>
    {!! Form::open(['route' => 'inCategoriesSearch', 'method' => 'GET', 'id' => 'search-categories-form', 'class' => 'navbar-left navbar-form navbar-search', 'role' => 'search']) !!}
{{--      <select name="insubgrp" class="search-category-select ">--}}
{{--        <option value="all">{{ trans('theme.all_categories') }}</option>--}}
{{--        @foreach($search_category_list as $search_category_grp)--}}
{{--          <optgroup label="{{ $search_category_grp->name }}">--}}
{{--            @foreach($search_category_grp->subGroups as $search_category)--}}
{{--              <option value="{{ $search_category->slug }}"--}}
{{--                @if(Request::has('insubgrp'))--}}
{{--                 {{ Request::get('insubgrp') == $search_category->slug ? ' selected' : '' }}--}}
{{--                @endif--}}
{{--              >{{ $search_category->name }}</option>--}}
{{--            @endforeach--}}
{{--          </optgroup>--}}
{{--        @endforeach--}}
{{--      </select>--}}
      <div class="form-group">
        {!! Form::text('q', Request::get('q'), ['class' => 'form-control', 'placeholder' => trans('theme.keyword')]) !!}
      </div>
      <a class="fa fa-search navbar-search-submit" onclick="document.getElementById('search-categories-form').submit()"></a>
    {!! Form::close() !!}
    <ul class="nav navbar-nav navbar-right navbar-mob-left">
{{--      <li>--}}
{{--        <a href="{{ route('cart.index') }}">--}}
{{--          <span>{{ trans('theme.your_cart') }}</span>--}}
{{--          <i class="fa fa-shopping-bag"></i>--}}
{{--          <div id="globalCartItemCount" class="badge">{{ cart_item_count() }}</div>--}}
{{--        </a>--}}
{{--      </li>--}}

      @auth('customer')
        <li class="dropdown">
          <a href="{{ route('account', 'dashboard') }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <span>{{ trans('theme.hello') . ', ' . Auth::guard('customer')->user()->getName() }}</span> {{ trans('theme.manage_your_account') }}
          </a>
          <ul class="dropdown-menu nav-list">
            <li><a href="{{ route('account', 'dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> @lang('theme.nav.dashboard')</a></li>
{{--            <li><a href="{{ route('account', 'orders') }}"><i class="fa fa-shopping-cart fa-fw"></i> @lang('theme.nav.my_orders')</a></li>--}}
            <li><a href="{{ route('account', 'wishlist') }}"><i class="fa fa-heart-o fa-fw"></i> @lang('theme.nav.my_wishlist')</a></li>
            <li><a href="{{ route('account', 'messages') }}"><i class="fa fa-envelope-o fa-fw"></i> @lang('theme.my_messages')</a></li>
{{--            <li><a href="{{ route('account', 'disputes') }}"><i class="fa fa-rocket fa-fw"></i> @lang('theme.nav.refunds_disputes')</a></li>--}}
{{--            <li><a href="{{ route('account', 'coupons') }}"><i class="fa fa-tags fa-fw"></i> @lang('theme.nav.my_coupons')</a></li>--}}
            {{-- <li><a href="{{ route('account', 'gift_cards') }}"><i class="fa fa-gift fa-fw"></i> @lang('theme.nav.gift_cards')</a></li> --}}
            <li><a href="{{ route('account', 'account') }}"><i class="fa fa-user fa-fw"></i> @lang('theme.nav.my_account')</a></li>
            <li class="sep"></li>
            <li><a href="{{ route('customer.logout') }}"><i class="fa fa-power-off fa-fw"></i> {{ trans('theme.logout') }}</a></li>
          </ul>
        </li>
      @else
        <li><a href="#nav-login-dialog" data-toggle="modal" data-target="#loginModal">{{ trans('theme.login_register') }}</a></li>
      @endauth

      <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false">
            <span class="sr-only">{{ trans('theme.nav.menu') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      </div>
    </ul>
  </div>
</nav>

<nav class="navbar-default border-bottom navbar-menu">
  <div class="container">
    <div class="collapse navbar-collapse" id="main-nav-collapse">
      <ul class="nav navbar-nav">
        <li>
{{--            <a class="navbar-item-mergin-top" href="{{ url('/selling') }}">{{ trans('theme.nav.sell_on', ['platform' => get_platform_title()]) }}</a>--}}
            <a class="navbar-item-mergin-top" href="{{ url('/') }}">Home</a>
        </li>

          @foreach($pages->where('position', 'main_nav') as $page)
              <li><a href="{{ get_page_url($page->slug) }}" class="navbar-item-mergin-top">{{ $page->title }}</a></li>
          @endforeach

      <li>
          <a class="navbar-item-mergin-top" href="{{ url('page/contact-us') }}">Contact us</a>
      </li>

      </ul>

      <ul class="nav navbar-nav navbar-right" style="display: none">
{{--        <li><a href="{{ route('account', 'wishlist') }}" class="navbar-item-mergin-top"><i class="fa fa-heart-o hidden-xs"></i> {{ trans('theme.nav.wishlist') }}</a></li>--}}

{{--        <li><a href="{{ get_page_url(\App\Page::PAGE_CONTACT_US) }}" class="navbar-item-mergin-top" target="_blank">{{ trans('theme.nav.support') }}</a></li>--}}

        @if(count(config('active_locales')) > 1)
          <li class="dropdown lang-dropdown">
            <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
{{--              <span>{{ trans('theme.nav.lang') }}</span>--}}
              <i class="fa fa-globe"></i>
              {{ config('active_locales')->firstWhere('code', App::getLocale())->language }}
            </a>
            <ul class="dropdown-menu">
              @foreach(config('active_locales') as $lang)
                <li class="{{$lang->code == \App::getLocale() ? 'selected' : ''}}">
                  <a href="{{route('locale.change', $lang->code)}}">
                    <img src="{{asset(sys_image_path('flags') . array_slice(explode('_', $lang->php_locale_code), -1)[0] . '.png')}}" class="lang-flag">
                    {{ $lang->language }}
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>