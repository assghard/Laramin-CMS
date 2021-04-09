<form action="{{ route('page.send-contact') }}" method="POST">
    {!! csrf_field() !!}
    <div class="form-group{{ $errors->has("email") ? ' has-error' : '' }}">
        <input class="form-control {{ $errors->has("email") ? 'is-invalid' : '' }}" placeholder="E-mail address" name="email" type="email" value="{{ old('email') }}" required />
        {!! $errors->first("email", '<span class="invalid-feedback">:message</span>') !!}
    </div>
    <div class="form-group{{ $errors->has("description") ? ' has-error' : '' }}">
        <textarea name="description" id="description" class="form-control {{ $errors->has("description") ? 'is-invalid' : '' }}" rows="10" placeholder="Description of your request" required>{{ old('description') }}</textarea>
        {!! $errors->first("description", '<span class="invalid-feedback">:message</span>') !!}
    </div>

    @include('pages.partials.g-recaptcha-v2')

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>