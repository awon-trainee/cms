<h5>{{ trans('backpack::base.register') }}</h5>
<form role="form" method="POST" action="{{ route('backpack.auth.register') }}" enctype="multipart/form-data" dir="rtl">
    @csrf
    <div class="form-group to mb-3">
        <label class="form-label" for="name">{{ trans('backpack::base.name') }}</label>
        <input autofocus tabindex="1" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="مثال: أحمد محمد">
        @if ($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>

    <div class="form-group oe mb-3">
        <label class="form-label" for="{{ backpack_authentication_column() }}">{{ trans(config('backpack.base.authentication_column_name')) }}</label>
        <input tabindex="2" type="{{ backpack_authentication_column()==backpack_email_column()?'email':'text'}}" class="form-control {{ $errors->has(backpack_authentication_column()) ? 'is-invalid' : '' }}" name="{{ backpack_authentication_column() }}" id="{{ backpack_authentication_column() }}" value="{{ old(backpack_authentication_column()) }}" placeholder="مثال: awon@hotmail.com">
        @if ($errors->has(backpack_authentication_column()))
            <div class="invalid-feedback">{{ $errors->first(backpack_authentication_column()) }}</div>
        @endif
    </div>

    <div class="form-group to sa mb-3">
        <label class="form-label" for="phone_number">{{ trans('validation.attributes.phone_number') }}</label>
        <input tabindex="2" type="text" maxlength="9" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
        @if ($errors->has('phone_number'))
            <div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
        @endif
    </div>

    <div class="form-group to mb-3">
        <label class="form-label" for="password">{{ trans('backpack::base.password') }}</label>
        <input tabindex="3" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" value="" placeholder="*******************************">
        @if ($errors->has('password'))
            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        @endif
    </div>

    <div class="form-group to mb-3">
        <label class="form-label" for="password_confirmation">{{ trans('backpack::base.confirm_password') }}</label>
        <input tabindex="4" type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" value="" placeholder="*******************************">
        @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
        @endif
    </div>

    <div class="form-group to mb-3">
        <label class="form-label" for="profile_photo">{{ trans('validation.attributes.profile_photo') }}</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input {{ $errors->has('profile_photo') ? 'is-invalid' : '' }}" name="profile_photo" id="profile_photo" lang="ar">
            @if ($errors->has('profile_photo'))
                <div class="invalid-feedback">{{ $errors->first('profile_photo') }}</div>
            @endif
        </div>
    </div>

    <button tabindex="6" type="submit" class="btn btn-primary regster wow animate__fadeInLeft">
        {{ trans('backpack::base.register') }}
    </button>
</form>
