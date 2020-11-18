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
            <div class="space20"></div>
            <h1 class="below-icon">Seller Center</h1>
        </div> <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'login', 'id' => 'form', 'data-toggle' => 'validator']) !!}
            <div class="form-group has-feedback">
                {!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => trans('app.form.email_address'), 'required']) !!}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control input-lg', 'id' => 'password', 'placeholder' => trans('app.form.password'), 'data-minlength' => '6', 'required']) !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <div class="help-block with-errors"></div>
            </div>

            <div class="row">
                <div class="col-xs-7">
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('remember', null, null, ['class' => 'icheck']) !!} {{ trans('app.form.remember_me') }}
                        </label>
                        </div>
                </div>
                <div class="col-xs-5">
                    {!! Form::submit(trans('app.form.login'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <a class="btn btn-link" href="{{ route('password.request') }}">{{ trans('app.form.forgot_password') }}</a>
        <a class="btn btn-link" href="{{ route('register') }}" class="text-center">{{ trans('app.form.register_as_merchant') }}</a>

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

    @if(config('app.demo') == TRUE)
        <div class="box login-box-body">
            <div class="box-header with-border">
                <h3 class="box-title">Demo Login::</h3>
            </div> <!-- /.box-header -->
            <div class="box-body">
                <p><strong>ADMIN::</strong> Username: <strong>superadmin@demo.com</strong> | Password: <strong>123456</strong></p>
                <p><strong>MERCHANT::</strong> Username: <strong>merchant@demo.com</strong> | Password: <strong>123456</strong></p>
            </div>
        </div>
    @endif
@endsection

<style>
    .btn-facebook {
        background: #4866A4;
    }

    .btn-google {
        background: #DC5A40;
    }

    .btn-line {
        background: #06b806;
        color: #fff;
    }

    .btn-social.btn-lg > :first-child {
        width: 34px;
    }
    .below-icon {
        color: #ff0003;
        font-weight: bold;
        text-transform: uppercase;
    }
</style>