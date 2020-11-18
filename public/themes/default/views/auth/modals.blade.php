<div class="modal auth-modal fade" id="loginModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="modal-title">{{ trans('theme.account_login') }}</span>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'customer.login.submit', 'id' => 'loginForm', 'data-toggle' => 'validator', 'novalidate']) !!}
          <div class="form-group">
              <input name="email" id="email" class="form-control input-lg flat" type="email" placeholder="{{ trans('theme.placeholder.your_email') }}" required/>
              <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
              <input name="password" id="password" class="form-control input-lg flat" type="password" placeholder="{{ trans('theme.placeholder.password') }}" required/>
              <div class="help-block with-errors"></div>
          </div>
          <div class="row">
            <div class="col-xs-7 col-md-6">
              <div class="form-group">
                <label>
                  <input name="remeber" id="remeber" class="i-check-blue" type="checkbox"/> {{ trans('theme.remember_me') }}
                </label>
              </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <input class="btn btn-block btn-lg flat btn-primary" type="submit" value="{{ trans('theme.button.login') }}">
            </div>
          </div>
        {!! Form::close() !!}

        <div class="row">
          <a class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#passwordResetModal">{{ trans('theme.forgot_password') }}</a>
          <a class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#createAccountModal">{{ trans('theme.register_here') }}</a>
        </div>

          <div class="social-auth-links text-center">
              <div class="row">
                  <div class="col-xs-12 col-md-4 nopadding-right">
                      <a href="{{ route('customer.login.social', 'facebook') }}" class="btn btn-block btn-social btn-facebook btn-lg flat"><i class="fa fa-facebook"></i> {{ trans('theme.button.login_with_fb') }}</a>
                  </div>
                  <div class="col-xs-12 col-md-4 nopadding-left nopadding-right">
                      <a href="{{ route('customer.login.social', 'google') }}" class="btn btn-block btn-social btn-google btn-lg flat"><i class="fa fa-google"></i> {{ trans('theme.button.login_with_g') }}</a>
                  </div>
                  <div class="col-xs-12 col-md-4 nopadding-left">
                      <a href="{{ route('customer.login.social', 'line') }}" class="btn btn-block btn-social btn-line btn-lg flat"><img src="{{ get_storage_file_url('LINE_SOCIAL_Square.png') }}"
                                                                                                                                        alt=""> {{ trans('theme.button.login_with_line') }}</a>
                  </div>
              </div>
          </div>
      </div><!-- /.modal-body -->

        <div class="modal-footer">
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /#loginModal -->

<div class="modal auth-modal fade" id="sellerCenterModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content flat">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="modal-title">Seller Center</span>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'login', 'id' => 'form', 'data-toggle' => 'validator', 'novalidate']) !!}
                <div class="form-group">
                    <input name="email" id="seller-email" class="form-control input-lg flat" type="email" placeholder="{{ trans('theme.placeholder.your_email') }}" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input name="password" id="seller-password" class="form-control input-lg flat" type="password" placeholder="{{ trans('theme.placeholder.password') }}" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                    <div class="col-xs-7 col-md-6">
                        <div class="form-group">
                            <label>
                                <input name="remeber" id="seller-remeber" class="i-check-blue" type="checkbox"/> {{ trans('theme.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <input class="btn btn-block btn-lg flat btn-primary" type="submit" value="{{ trans('theme.button.login') }}">
                    </div>
                </div>
                {!! Form::close() !!}

                <div class="row">
                    <a class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#passwordResetModal">{{ trans('theme.forgot_password') }}</a>
{{--                    <a class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#createAccountModal">{{ trans('theme.register_here') }}</a>--}}
                </div>

                <!-- <div class="social-auth-links text-center">
                    <div class="row">
                        <div class="col-xs-12 col-md-4 nopadding-right">
                            <a href="{{ route('customer.login.social', 'facebook') }}" class="btn btn-block btn-social btn-facebook btn-lg flat"><i class="fa fa-facebook"></i> {{ trans('theme.button.login_with_fb') }}</a>
                        </div>
                        <div class="col-xs-12 col-md-4 nopadding-left nopadding-right">
                            <a href="{{ route('customer.login.social', 'google') }}" class="btn btn-block btn-social btn-google btn-lg flat"><i class="fa fa-google"></i> {{ trans('theme.button.login_with_g') }}</a>
                        </div>
                        <div class="col-xs-12 col-md-4 nopadding-left">
                            <a href="{{ route('customer.login.social', 'line') }}" class="btn btn-block btn-social btn-line btn-lg flat"><img src="{{ get_storage_file_url('LINE_SOCIAL_Square.png') }}"
                                                                                                                                              alt=""> {{ trans('theme.button.login_with_line') }}</a>
                        </div>
                    </div>
                </div> -->
            </div><!-- /.modal-body -->

            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#loginSellerModal -->

<div class="modal auth-modal fade" id="createAccountModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content flat">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="modal-title">{{ trans('theme.create_account') }}</span>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'customer.register', 'id' => 'registerForm', 'data-toggle' => 'validator', 'novalidate']) !!}
          <div class="form-group">
            <input name="name" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.full_name') }}" type="text" required/>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input name="email" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.your_email') }}" type="email" required/>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input name="password" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.password') }}" type="password" required/>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input name="password_confirmation" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.confirm_password') }}" type="password" required/>
            <div class="help-block with-errors"></div>
          </div>
{{--          @if(config('system_settings.ask_customer_for_email_subscription'))--}}
{{--            <div class="form-group">--}}
{{--              <label>--}}
{{--                <input name="subscribe" class="i-check-blue" type="checkbox"/> {{ trans('theme.input_label.subscribe_to_the_newsletter') }}--}}
{{--              </label>--}}
{{--            </div>--}}
{{--          @endif--}}
          <div class="row">
            <div class="col-xs-7 col-md-6">
              <div class="form-group">
                <label>
                  <input name="agree" class="i-check-blue" type="checkbox" required/> {!! trans('theme.input_label.i_agree_with_terms', ['url' => route('page.open', \App\Page::PAGE_TNC_FOR_CUSTOMER)]) !!}
                </label>
                  <div class="help-block with-errors"></div>
              </div>
            </div>
              <div class="col-xs-12 col-md-6">
                  <input class="btn btn-block btn-lg flat btn-primary" type="submit" value="{{ trans('theme.create_account') }}" />
            </div>
          </div>
        {!! Form::close() !!}

        <div class="row">
          <a class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">{{ trans('theme.have_account') }}</a>
        </div>

          <div class="social-auth-links text-center">
              <div class="row">
                  <div class="col-xs-12 col-md-4 nopadding-right">
                      <a href="{{ route('customer.login.social', 'facebook') }}" class="btn btn-block btn-social btn-facebook btn-lg flat"><i class="fa fa-facebook"></i> {{ trans('theme.button.login_with_fb') }}</a>
                  </div>
                  <div class="col-xs-12 col-md-4 nopadding-left nopadding-right">
                      <a href="{{ route('customer.login.social', 'google') }}" class="btn btn-block btn-social btn-google btn-lg flat"><i class="fa fa-google"></i> {{ trans('theme.button.login_with_g') }}</a>
                  </div>
                  <div class="col-xs-12 col-md-4 nopadding-left">
                      <a href="{{ route('customer.login.social', 'line') }}" class="btn btn-block btn-social btn-line btn-lg flat"><img src="{{ get_storage_file_url('LINE_SOCIAL_Square.png') }}" alt=""> {{ trans('theme.button.login_with_line') }}</a>
                  </div>
              </div>
          </div>
      </div><!-- /.modal-body -->
        <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#createAccountModal -->

<div class="modal auth-modal fade" id="createSellerAccountModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content flat">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="modal-title">Create account for seller</span>
            </div>
            <div class="modal-body">
{{--                {!! Form::open(['route' => 'customer.register', 'id' => 'registerForm', 'data-toggle' => 'validator', 'novalidate']) !!}--}}
                {!! Form::open(['route' => 'register', 'id' => config('system_settings.required_card_upfront') ? 'stripe-form' : 'registration-form', 'data-toggle' => 'novalidate']) !!}

                <div class="form-group has-feedback" style="display: none">
                    <select name="plan" id="plans">
                        <option value="individual" selected></option>
                    </select>
{{--                    {{ Form::select('plan', null, isset($plan) ? null : Null, ['id' => 'plans' , 'class' => 'form-control input-lg', 'required']) }}--}}
{{--                    <i class="glyphicon glyphicon-dashboard form-control-feedback"></i>--}}
{{--                    <div class="help-block with-errors">--}}
{{--                        @if((bool) config('system_settings.trial_days'))--}}
{{--                            {{ trans('help.charge_after_trial_days', ['days' => config('system_settings.trial_days')]) }}--}}
{{--                        @endif--}}
{{--                    </div>--}}
                </div>


                <div class="form-group">
                    <input name="name" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.full_name') }}" type="text" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input name="email" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.your_email') }}" type="email" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input name="password" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.password') }}" type="password" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input name="password_confirmation" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.confirm_password') }}" type="password" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
{{--                    {!! Form::text('shop_name', null, ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.shop_name'), 'required']) !!}--}}
                    <input name="shop_name" class="form-control input-lg flat" placeholder="{{ trans('app.placeholder.shop_name') }}" type="text" required/>
                    <div class="help-block with-errors"></div>
                </div>
                {{--          @if(config('system_settings.ask_customer_for_email_subscription'))--}}
                {{--            <div class="form-group">--}}
                {{--              <label>--}}
                {{--                <input name="subscribe" class="i-check-blue" type="checkbox"/> {{ trans('theme.input_label.subscribe_to_the_newsletter') }}--}}
                {{--              </label>--}}
                {{--            </div>--}}
                {{--          @endif--}}
                <div class="row">
                    <div class="col-xs-7 col-md-6">
                        <div class="form-group">
                            <label>
                                <input name="agree" class="i-check-blue" type="checkbox" required/> {!! trans('theme.input_label.i_agree_with_terms', ['url' => route('page.open', \App\Page::PAGE_TNC_FOR_CUSTOMER)]) !!}
                            </label>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <input class="btn btn-block btn-lg flat btn-primary" type="submit" value="{{ trans('theme.create_account') }}" />
                    </div>
                </div>
                {!! Form::close() !!}

                <div class="row">
                    <a class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">{{ trans('theme.have_account') }}</a>
                </div>

                <!-- <div class="social-auth-links text-center">
                    <div class="row">
                        <div class="col-xs-12 col-md-4 nopadding-right">
                            <a href="{{ route('customer.login.social', 'facebook') }}" class="btn btn-block btn-social btn-facebook btn-lg flat"><i class="fa fa-facebook"></i> {{ trans('theme.button.login_with_fb') }}</a>
                        </div>
                        <div class="col-xs-12 col-md-4 nopadding-left nopadding-right">
                            <a href="{{ route('customer.login.social', 'google') }}" class="btn btn-block btn-social btn-google btn-lg flat"><i class="fa fa-google"></i> {{ trans('theme.button.login_with_g') }}</a>
                        </div>
                        <div class="col-xs-12 col-md-4 nopadding-left">
                            <a href="{{ route('customer.login.social', 'line') }}" class="btn btn-block btn-social btn-line btn-lg flat"><img src="{{ get_storage_file_url('LINE_SOCIAL_Square.png') }}" alt=""> {{ trans('theme.button.login_with_line') }}</a>
                        </div>
                    </div>
                </div> -->
            </div><!-- /.modal-body -->
            <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#createSellerAccountModal -->

<div class="modal auth-modal fade" id="passwordResetModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="modal-title">{{ trans('theme.password_recovery') }}</span>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'customer.password.email', 'id' => 'psswordRecoverForm', 'data-toggle' => 'validator', 'novalidate']) !!}
          <div class="form-group">
            <input name="email" class="form-control input-lg flat" placeholder="{{ trans('theme.placeholder.your_email') }}" type="email" required />
            <div class="help-block with-errors"></div>
          </div>
          <input class="btn btn-block flat btn-primary" type="submit" value="{{ trans('theme.button.recover_password') }}" />
        {!! Form::close() !!}
      </div><!-- /.modal-body -->
      <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /#passwordResetModal -->

<style>
    .modal-header {
        border: none;
        padding-top: 20px;
        padding-left: 20px;
    }
    .auth-modal .input-lg {
        font-size: 14px;
    }
    .modal .btn-primary {
        background: #f3803a !important;
    }
    .modal-title {
        color: #f3803a;
    }
    .btn-link {
        color: #7b7b7b;
    }
    .auth-modal .btn {
        font-weight: normal !important;
        font-family: 'Prompt';
    }

    .btn-facebook {
        background: #4866A4;
    }

    .btn-google {
        background: #DC5A40;
    }

    .btn-line {
        background: #06b806;
    }

    @media (min-width: 768px) {
        .modal-dialog.modal-sm {
            width: 650px;
        }
    }

    @media (max-width: 767px) {
        .btn-social {
            margin-top: 15px;
        }
    }

    .btn-social > :first-child {
        width: 34px;
    }
</style>