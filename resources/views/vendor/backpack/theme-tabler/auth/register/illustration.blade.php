@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 ws mt-1 ">
            <div class="all">
            </div>
            <div class="all-values Two to se s">
            <div class="input-all sing-in ">
                    @include(backpack_view('auth.register.inc.form'))
                </div>
                <div class="welcome-log-in text-center">
                    <div class="imag-a">
                    <span>
                    <img src="{{ $logo }}">
                    </span>
                    </div>
                    <h5>مرحبا بك</h5>
                    <div class="text-center text-muted mt-4">
                       <a tabindex="6" class="w-100" href="{{ route('backpack.auth.login') }}">{{ trans('backpack::base.login') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
