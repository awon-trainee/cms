@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 ws mt-1 ">
            <div class="all">
            </div>
            <div class="all-values Two to se s">
            <div class="input-all sing-in ">
                    <h5 class="mb-3">{{ trans('backpack::base.reset_password') }}</h5>
                    <p class="resp">لا ستعادة كلمة المرور قم بتعبئة البيانات التالية الخاصة بحسابك</p>
                    @if (session('status'))
                        <div class="col-12">
                            <div class="alert alert-success mt-3">
                                {{ session('status') }}
                            </div>
                        </div>
                    @else
                        <form  role="form" method="POST"
                              action="{{ route('backpack.auth.password.email') }}">
                            @csrf
                            <div class="form-group to ">
                                <label class="form-label"
                                       for="email">{{ trans('backpack::base.email_address') }}</label>
                                <input autofocus type="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       name="email" id="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                                <button type="submit" class="btn btn-primary mb-4 cust-w">
                                    {{ trans('backpack::base.send_reset_link') }}
                                </button>
                        </form>
                    @endif

                </div>
                <div class="welcome-log-in text-center">
                    <div class="imag-a">
                    <span>
                    <img src="{{ $logo }}">
                    </span>
                    </div>
                    <h5>مرحبا بك</h5>
                    <div class="text-center pt-3 justify-content-center d-flex gap-2">
                            <a href="{{ route('backpack.auth.login') }}">{{ trans('backpack::base.login') }}</a>
                            @if (config('backpack.base.registration_open'))
                                / <a href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a>
                            @endif
                        </div>
                </div>

            </div>
        </div>
    </div>
@endsection
