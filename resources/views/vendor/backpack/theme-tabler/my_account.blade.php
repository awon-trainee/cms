@extends('layouts.app')

@section('after_styles')
    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
@endsection

@php
    $breadcrumbs = [
        trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
        trans('backpack::base.my_account') => false,
    ];
@endphp

@section('header')
    <section class="content-header">
        <div class="container-fluid mb-3">
            <h1>{{ trans('backpack::base.my_account') }}</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100"> ملفي الشخصي</h4>
                </div><!--title-->
            </div>
            <div class="all-values Two to ">
                <div class="row justify-content-center">

                    @if (session('alert_messages.success'))
                        <div class="col-lg-8">
                            <div class="alert alert-success">
                                {{ session('alert_messages.success.0') }}
                            </div>
                        </div>
                    @endif

                    @if (isset($errors) && $errors->count())
                        <div class="col-lg-8">
                            <div class="alert alert-danger">
                                <ul class="mb-1">
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li><br>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    {{-- UPDATE INFO FORM --}}
                    <div class="col-lg-12 mb-4">
                        <form class="input-all on" action="{{ route('backpack.account.info.store') }}" method="post">

                            {!! csrf_field() !!}


                            <div class="card-body backpack-profile-form bold-labels">

                                    <div class="form-group">
                                        @php
                                            $label = 'الاسم';
                                            $field = 'name';
                                        @endphp
                                        <label class="required">{{ $label }}</label>
                                        <input required class="form-control" type="text" name="{{ $field }}" placeholder="محمد أحمد"
                                               value="{{ old($field) ? old($field) : $user->$field }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="required">البريد الالكتروني</label>
                                        <input required class="form-control"
                                               type="email" disabled
                                               value="{{ $user->email }}">
                                    </div>


                                    <div class="form-group">
                                        <label class="required form-label">رقم الجوال</label>
                                        <div class="input-group" dir="ltr">
                                            <span class="input-group-text">+966</span>
                                            <input required class="form-control" type="text" name="phone_number" maxlength="9"
                                                   value="{{ old('phone', $user->phone_number) }}">
                                        </div>

                                    <div class="form-group">
                                        <input type="checkbox" name="mailing_list" value="1" id="mailingListCheckbox"
                                            @checked($user->subscribedToMailingList())>
                                        <label for="mailingListCheckbox">النشرة البريدية</label>
                                    </div>
                            </div>

                            <button type="submit" class="btn btn-primary bt-2n"><i
                                    class="la la-save"></i> حفظ التغييرات
                            </button>

                        </form>
                    </div>

                    {{-- CHANGE PASSWORD FORM --}}
                    <div class="col-lg-12 mb-4 mt-4">
                        <form class="input-all on" action="{{ route('backpack.account.password') }}" method="post">
                            {!! csrf_field() !!}
                            <h3 class="card-title">تغيير كلمة المرور</h3>
                            <div class="card-body backpack-profile-form bold-labels">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        @php
                                            $label = 'كلمة المرور القديمة';
                                            $field = 'old_password';
                                        @endphp
                                        <label class="required">{{ $label }}</label>
                                        <input autocomplete="new-password" required class="form-control"
                                               type="password" name="{{ $field }}" id="{{ $field }}" value="">
                                    </div>

                                    <div class="col-md-6">
                                        @php
                                            $label = 'كلمة المرور الجديدة';
                                            $field = 'new_password';
                                        @endphp
                                        <label class="required">{{ $label }}</label>
                                        <input autocomplete="new-password" required class="form-control"
                                               type="password" name="{{ $field }}" id="{{ $field }}" value="">
                                    </div>

                                    <div class="col-md-6">
                                        @php
                                            $label = 'تأكيد كلمة المرور';
                                            $field = 'confirm_password';
                                        @endphp
                                        <label class="required">{{ $label }}</label>
                                        <input autocomplete="new-password" required class="form-control"
                                               type="password" name="{{ $field }}" id="{{ $field }}" value="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success bt-2n"><i
                                    class="la la-save"></i> حفظ التغييرات
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="contact-with">
        <ul class="list-group animate__fadeInUp" data-wow-iteration="1" data-wow-duration=".5s">
          <li class="nav-con conta">
           <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-headset text-dark" viewBox="0 0 16 16">
             <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z"/>
           </svg></a>

           <p class="p-3 bg-dark-custome text-light text-center">نموذج التواصل</p>

          </li>
          <li class="nav-con conta">
            <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" svg-telephone bi bi-telephone-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
            </svg></a>

            <p class="p-3 bg-dark-custome text-light text-center">تواصل عبر الجوال</p>

           </li>
          <li class="nav-con conta">
            <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" svg-mail bi bi-envelope-fill" viewBox="0 0 16 16">
              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"></path>
            </svg></a>

            <p class="p-3 bg-dark-custome text-light text-center">تواصل عبر الإيميل</p>

           </li>
          <li class="nav-con conta">
            <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-whatsapp bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
            </svg></a>

            <p class="p-3 bg-dark-custome text-light text-center">تواصل عبر واتساب</p>

           </li>

          <li class="nav-con conta">
            <a href="#" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-twitter bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
              </svg>
            </a>

            <p class="p-3 bg-dark-custome text-light text-center">صفحتنا على تويتر</p>

           </li>
       </ul>
       <a  href="{{ route('contact-us.index') }}" class="link-con">
            تواصل معنا
        </a>
      </div>
    </div>
@endsection
