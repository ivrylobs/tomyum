@extends('auth.master')

@section('content')
  <div class="box login-box-body">
    <div class="box-header with-border text-center">
        <a href="{{ url('/') }}">
            @if( Storage::exists('logo.png') )
                <img src="{{ url('image/logo.png') }}" class="brand-logo" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}"/>
            @else
                <img src="https://placehold.it/140x60/eee?text={{ get_platform_title() }}" class="brand-logo" alt="LOGO" title="LOGO"/>
            @endif
        </a>
        <div class="space10"></div>
        <h1 class="below-icon">Sell on Tomyum</h1>
    </div> <!-- /.box-header -->
    <div class="box-body">
      {!! Form::open(['route' => 'register', 'id' => config('system_settings.required_card_upfront') ? 'stripe-form' : 'registration-form', 'data-toggle' => 'validator']) !!}
        <div class="form-group has-feedback" style="display: none">
{{--          {{ Form::select('plan', $plans, isset($plan) ? $plan : Null, ['id' => 'plans' , 'class' => 'form-control input-lg', 'required']) }}--}}
{{--            <i class="glyphicon glyphicon-dashboard form-control-feedback"></i>--}}
{{--            <div class="help-block with-errors">--}}
{{--              @if((bool) config('system_settings.trial_days'))--}}
{{--                {{ trans('help.charge_after_trial_days', ['days' => config('system_settings.trial_days')]) }}--}}
{{--              @endif--}}
{{--            </div>--}}
            <select name="plan" id="plans">
                <option value="individual" selected></option>
            </select>
        </div>
        <div class="form-group has-feedback">
            {!! Form::text('full_name', null, ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.full_name'), 'required']) !!}
            <i class="glyphicon glyphicon-equalizer form-control-feedback"></i>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group has-feedback">
          {!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.valid_email'), 'required']) !!}
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group has-feedback">
            {!! Form::password('password', ['class' => 'form-control input-lg', 'id' => 'password', 'placeholder' => trans('app.placeholder.password'), 'data-minlength' => '6', 'required']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group has-feedback">
            {!! Form::password('password_confirmation', ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.confirm_password'), 'data-match' => '#password', 'required']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group has-feedback">
            {!! Form::text('shop_name', null, ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.shop_name'), 'required']) !!}
            <i class="glyphicon glyphicon-equalizer form-control-feedback"></i>
            <div class="help-block with-errors"></div>
        </div>

        @if(config('system_settings.required_card_upfront'))
          @include('auth.stripe_form')
        @endif

        <div class="row">
          <div class="col-xs-8">
            <div class="form-group">
                <label>
                    {!! Form::checkbox('agree', null, null, ['class' => 'icheck', 'required']) !!} {!! trans('app.form.i_agree_with_merchant_terms', ['url' => route('page.open', \App\Page::PAGE_TNC_FOR_MERCHANT)]) !!}
                </label>
                <div class="help-block with-errors"></div>
            </div>
          </div>

          <div class="col-xs-4">
            {!! Form::submit(trans('app.form.register'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']) !!}
          </div>
        </div>
      {!! Form::close() !!}

      <a href="{{ route('login') }}" class="btn btn-link">{{ trans('app.form.merchant_login') }}</a>

        <!-- <div class="social-auth-links text-center">
            <div class="row">
                <div class="col-xs-12 col-md-4 nopadding-right">
                    <a href="{{ route('admin.login.social', 'facebook') }}" class="btn btn-block btn-social btn-facebook btn-lg flat"><i class="fa fa-facebook"></i> {{ trans('theme.button.login_with_fb') }}</a>
                </div>
                <div class="col-xs-12 col-md-4 nopadding-left nopadding-right">
                    <a href="{{ route('admin.login.social', 'google') }}" class="btn btn-block btn-social btn-google btn-lg flat"><i class="fa fa-google"></i> {{ trans('theme.button.login_with_g') }}</a>
                </div>
                <div class="col-xs-12 col-md-4 nopadding-left">
                    <a href="{{ route('admin.login.social', 'line') }}" class="btn btn-block btn-social btn-line btn-lg flat">
                        <img style="width:34px" src="{{ get_storage_file_url('LINE_SOCIAL_Square.png') }}" alt=""> {{ trans('theme.button.login_with_line') }}
                    </a>
                </div>
            </div>
        </div> -->


    </div>
  </div>
  <!-- /.form-box -->
@endsection

@section('scripts')
  @include('plugins.stripe-scripts')
@endsection

<style>
    .below-icon {
        color: #ff0003;
        font-weight: bold;
        text-transform: uppercase;
    }
    .btn-line {
        background: #06b806;
        color: #fff;
    }
</style>
