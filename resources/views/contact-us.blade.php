@extends('layouts.app')

@section('content')
<div class="all-secshen mt-6">
    <div class="viergein viergein-active-2 mt-1">
        <div class="all">
            <div class="topnav"><!--اضافة ناف بار للعنوان -->
                <a class="navbar-brand" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                      </svg>
                تواصل معنا
               </a>
           <!--title-->
        </div>
        <div class="all-values Two to ss-con p-sm-3">
            {{------------------ Form ------------------}}

                <div id="div6"style="
                 align-items: center;
 border-radius: 3%;
                 border: 2px solid #ced4da !important;
    box-shadow: 2 2 2 2 black !important;
      position: absolute;
      top: 70px;
      left: -80px;
      width: 570px;
      padding-top: 125px;
      background-color:  rgba(217, 217, 217, 1);
      text-align: center;">
      <h5>نسعد بتواصلكم معنا </h5>
                     <div style="j align-items: center;">
                        <h6 class=" text-center pb-2">
                        مواقع التواصل الاجتماعي
                        </h6>
                        <hr class=" width:1%  border-primary-web">
                        <div class="p-0 p-lg-2 text-center">
                            <ul class="wow animate__fadeInRight px-2" data-wow-duration=".5s" data-wow-iteration="1" data-wow-offset="50"
                                style="visibility: visible; animation-duration: .5s; animation-iteration-count: 1; animation-name: fadeInRight;  margin: 10px 0;
    width: 100%;
    text-align: center;
">
                                @foreach($social as $name => $link)
                                    @if(!empty($link))
                                        <li class="nav-item"><a target="_blank" href="{{$link}}" class="nav-link"style=" padding: 9px;  background: none; justify-content: center;   margin: 3px; cursor: pointer;    align-content: center; flex-wrap: wrap;
    display: block;">
                                                <x-dynamic-component :component="'icons.'.$name"/>
                                            </a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <h5>موقعنا الجغرافي:</h5>
                    @if(!empty($social['google_maps_location']))
                    <div >
                        <div class="iframe">
                            {!! $social['google_maps_location'] !!}
                        </div>
                    </div>
                    @endif
<h6>مكة المكرمة،العابدية،شركة وادي مكة، الدور الثاني </h6>
<h5>اوقات العمل </h5>
<h6>من الساعة الثامنة صباحا حتى الثالثة عصرا </h6>
            </div>
            <form class="input-all con-wh-us" method="post" action="{{ route('contact-us.store') }}"style= " left: 300px;  box-shadow:none; border: none ;
    " >
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
                    <input required type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone" class="mb-1">رقم التواصل<span>*</span></label>
                    <input type="text" id="phone" required name="phone" value="{{ old('phone') }}" minlength="10"
                        class="form-control @error('phone') is-invalid @enderror" placeholder="رقم التواصل">
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
                            <input type="radio" name="type" required value="{{ $type->value }}"
                                @checked(old('type') == $type->value)>{{ $type->nameAr() }}</label>
                    @endforeach
                    @error('type')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div><!--/laepel-6-->

                <div class="form-group">
                    <label for="massage" class="d-block form-label">الرسالة<span>*</span></label>
                    <textarea required cols="40" name="message" rows="5"
                        class="form-control @error('message') is-invalid @enderror" id="massage"
                        placeholder="الرسالة">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @if(auth()->check())
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                @endif
                <input class="btn btn-primary wow animate__fadeInLeft" type="submit" data-wow-iteration="1"
                    data-wow-duration="2s" value="إرسال"
                    style=" background: rgb(63, 75, 187); visibility: visible; animation-duration: 2s; animation-iteration-count: 1; animation-name: fadeInLeft;">

            </form><!--/input-all-->


            {{------------------ Information ------------------}}
          <!--  <div class="date-jmia-alls">
                <div class="item-date-alls">
                    <span class="sp">
                        <x-icons.email />
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
                        <x-icons.telephone />
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
                        <x-icons.location />
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
                        <x-icons.person />
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
            </div>-->
        </div>

    </div>
    <x-buttons.contact-us />
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

<style>


.topnav {

background: rgb(63, 75, 187);
position: absolute; /* Set the navbar to fixed position */
top:-10%; /* Position the navbar at the top of the page */
width: 100%;
height: 70px;
flex-wrap: wrap;




}


</style>
