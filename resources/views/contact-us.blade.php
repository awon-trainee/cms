@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">تواصل معنا</h4>
                </div><!--title-->
            </div>
            <div class="all-values Two to ss-con p-sm-3">
                {{------------------ Form ------------------}}
                <form class="input-all con-wh-us" method="post" action="{{ route('contact-us.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="mb-1">الإسم<span>*</span></label>
                        <input type="text" id="name" value="{{ old('name') }}" autofocus required name="name"
                               class="form-control @error('name') is-invalid @enderror" placeholder="الإسم الثلاثي">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="mb-1">البريد الإلكتروني<span>*</span></label>
                        <input required type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                               placeholder="البريد الإلكتروني">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone" class="mb-1">رقم التواصل<span>*</span></label>
                        <input type="text" id="phone" required name="phone" value="{{ old('phone') }}" minlength="10" class="form-control @error('phone') is-invalid @enderror"
                               placeholder="رقم التواصل">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="laepel-6">
                        <label class="title mb-1">نوع الرسالة<span>*</span></label>
                        @foreach($contactTypes as $type)
                            <label class="checkbox-inline">
                                <input type="radio" name="type" required value="{{ $type->value }}" @checked(old('type') == $type->value)>{{ $type->nameAr() }}</label>
                        @endforeach
                        @error('type')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div><!--/laepel-6-->

                    <div class="form-group">
                        <label for="massage" class="d-block form-label">الرسالة<span>*</span></label>
                        <textarea required cols="40" name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                  id="massage" placeholder="الرسالة">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <input class="btn btn-primary wow animate__fadeInLeft" type="submit" data-wow-iteration="1"
                           data-wow-duration="2s" value="إرسال"
                           style="visibility: visible; animation-duration: 2s; animation-iteration-count: 1; animation-name: fadeInLeft;">

                </form><!--/input-all-->

                {{------------------ Information ------------------}}
                <div class="date-jmia-alls">
                    <div class="item-date-alls">
                <span class="sp">
                    <x-icons.email/>
                </span>
                        <div class="title d-inline-block">
                            <label>البريد الإلكتروني</label>
                            <p>
                                <a class="pe-2" href="mailto:{{ $settings->email }}">
                                    {{ $settings->email }}
                                </a>
                            </p>
                            <div>
                            </div>
                        </div>
                    </div>
                    <div class="item-date-alls">
                <span class="sp">
                    <x-icons.telephone/>
                </span>
                        <div class="title d-inline-block">
                            <label>رقم التواصل</label>
                            <p>
                                <a class="pe-2" href="tel:{{ $settings->phone }}" dir="ltr">
                                    {{ $settings->phone }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="item-date-alls">
                <span class="sp">
                    <x-icons.location/>
                </span>
                        <div class="title d-inline-block">
                            <label>الموقع</label>
                            <p>
                                <a class="pe-2" href="{{ $settings->map }}">
                                    {{ $settings->address }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="item-date-alls">
                <span class="sp">
                    <x-icons.person/>
                </span>
                        <div class="title d-inline-block">
                            <label>الرئيس التنفيذي</label>
                            <p class="ceo-deta-alls pe-2 pt-1">
                                {{ $settings->chief_executive_officer_name }}
                            </p>
                            <div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <x-buttons.contact-us/>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            })
            @endif
        });
    </script>
@endpush
