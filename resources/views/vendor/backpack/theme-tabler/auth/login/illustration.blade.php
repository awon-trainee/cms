@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 ws mt-1 ">
            <div class="all">
            </div>
            <div class="all-values Two to se">
                <div class="welcome-log-in text-center">
                    <div class="imag-a">
                    <span>
                    <img src="{{ $logo }}">
                    </span>
                    </div>
                    <h5>مرحبا بك</h5>
                    @if (config('backpack.base.registration_open'))
        <div class="text-center text-muted mt-4">
            <a tabindex="6" class="w-100" href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a>
        </div>
    @endif
                </div>
                <div class="input-all sing-in">
                    @include(backpack_view('auth.login.inc.form'))
                </div>

        </div>
    </div>
@endsection
