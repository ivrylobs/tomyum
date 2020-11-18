{{--<div class="section-title">--}}
{{--    --}}{{--  <h4>@lang('theme.section_headings.contact_form')</h4>--}}
{{--</div>--}}

{!! Form::open(['route' => 'contact_us', 'id' => 'contact_us_form', 'role' => 'form', 'data-toggle' => 'validator']) !!}
<div class="row contact-us-form">
    <div class="col-md-6">
        <label for="">Full Name</label>
        <div class="form-group">
            {!! Form::text('name', null, ['class' => 'form-control input-lg flat', 'maxlength' => '100', 'required']) !!}
            {{--            <div class="help-block with-errors"></div>--}}
        </div>
    </div>
    <div class="col-md-6">
        <label for="">Subject</label>
        <div class="form-group">
            {!! Form::text('subject', null, ['class' => 'form-control input-lg flat', 'maxlength' => 200, 'required']) !!}
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <label for="">Email</label>
                <div class="form-group">
                    {!! Form::email('email', null, ['class' => 'form-control input-lg flat', 'maxlength' => '100', 'required']) !!}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="">Phone Number</label>
                <div class="form-group">
                    {!! Form::text('subject', null, ['class' => 'form-control input-lg flat',  'maxlength' => 200, 'required']) !!}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label for="">Message</label>
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control input-lg flat',  'rows' => 3, 'maxlength' => 500, 'required']) !!}
            <div class="help-block with-errors"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            @if(config('services.recaptcha.key'))
                <div class="space10"></div>
                <div class="g-recaptcha"
                     data-sitekey="{{ config('services.recaptcha.key') }}">
                </div>
                <div class="space20"></div>
            @endif
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="col-md-6 nopadding-right">
        <div class="form-group">
            <button type="submit" id="btn-send-msg" class='btn btn-primary btn-lg'><i class="fa fa-paper-plane"></i> {{ trans('theme.button.send_message') }}</button>
        </div>
    </div>

</div>
<input type="hidden" name="shop_id" value="{{ $shop->id }}">
{!! Form::close() !!}

<script src='https://www.google.com/recaptcha/api.js'></script>

<style>
    #btn-send-msg {
        background: #FF0002 !important;
    }

    .contact-us-form label {
        color: #FF0002;
        font-size: 16px;
        font-weight: normal;
    }

    .help-block with-errors {
        display: inline-block;
    }

    .contact-us-form .flat {
        border-radius: 20px !important;
        border-color: #FF0002;
    }

    label {
        font-weight: normal;
    }
    .g-recaptcha {
        overflow: hidden;
    }
</style>