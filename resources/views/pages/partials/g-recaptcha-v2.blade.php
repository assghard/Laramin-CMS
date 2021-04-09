<div class="text-center d-block">
    <div class="form-group{{ $errors->has("g-recaptcha-response") ? ' has-error' : '' }}">
        <div class="g-recaptcha d-inline-block" id="g-recaptcha-v2" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
        {!! $errors->first('g-recaptcha-response', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
    </div>
</div>

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js?onload=captchaOnload&render=explicit&sitekey={{ env('GOOGLE_RECAPTCHA_KEY') }}&hl={{ env('APP_LOCALE') }}" async defer></script>
    <script type="text/javascript">
        var captchaOnload = function() {
            grecaptcha.render('g-recaptcha-v2');
          };
    </script>
@endpush