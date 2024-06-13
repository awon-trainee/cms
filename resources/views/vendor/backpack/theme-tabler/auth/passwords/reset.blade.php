@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 ws mt-1 ">
            <div class="all">
            </div>
            <div class="all-values Two to se s">
                <div class="welcome-log-in text-center">
                    <div class="imag-a">
                    <span>
                    <img src="{{ $logo }}">
                    </span>
                    </div>
                    <h5>مرحبا بك</h5>

                </div>
                <div class="input-all sing-in ">
                    <h2 class="h2 text-center my-4">{{ trans('backpack::base.reset_password') }}</h2>
                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @else
                        <form class="col-md-12 p-t-10" role="form" method="POST"
                              action="{{ route('backpack.auth.password.reset') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="email" class="form-control" name="email" hidden value="{{ $email }}">

                            <div class="mb-3">
                                <label class="form-label" for="password">{{ trans('backpack::base.password') }}</label>
                                <input type="password"
                                       class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       name="password" id="password" value="">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                       for="password_confirmation">{{ trans('backpack::base.confirm_password') }}</label>
                                <input type="password"
                                       class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                       name="password_confirmation" id="password_confirmation" value="">
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ trans('backpack::base.change_password') }}
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
