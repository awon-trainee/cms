<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{------------------ Head ------------------}}
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title  -->
    {{-- TODO: Change title --}}
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- style-css  -->
    <style>
        /** colors vars **/
        :root{
            --primary-charity-color: {{ $generalSettings->rgbPrimaryColor() }};
            --secondary-charity-color: {{ $generalSettings->rgbSecondaryColor() }};
            --third-charity-color: {{ $generalSettings->rgbThirdColor() }};
        }
    </style>
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <!-- bootstrap-style-->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-styles/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-styles/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-styles/bootstrap.min.css.map")}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&family=Noto+Kufi+Arabic:wght@400;500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    @stack('styles')

</head>

{{------------------ Body ------------------}}
<body dir="rtl">

{{------------------ Navbar ------------------}}
<nav class="nav">
    <li class="logo nav-item">
        <a href="/" class="nav-link p-0 d-flex justify-content-center align-items-center" style=>
            <div class="bg-logo w-100 h-100 m-2 rounded-circle" style="background:url({{$logo}}) center center no-repeat; background-size: contain;"></div>
        </a>
    </li>
    <div id="navbar">

        {{------------------ Navbar toggle button ------------------}}
        <div class="content" id="icon">
            <div class="icon1"></div>
            <div class="icon2"></div>
            <div class="icon3"></div>
        </div>

        {{------------------ Navbar items ------------------}}
        {{-- TODO: highlight selected item using active class --}}
        <ul class="ul-style navbar-items-ul" >
            <li class="nav-item">
                <a href="/" @class(['nav-link', 'active' => request()->routeIs('home')])>{{$pages['home']}}</a>
            </li>

            <li class="nav-item" id="ul-dropdown">

                <a href="#" @class(['nav-link', 'active' => request()->routeIs('about-us', 'board-of-directors', 'general-assembly-members', 'working-team', 'organizational-chart')])>{{$pages['about_us']}}</a>

                <ul class="ul-dropdown wow animate__fadeInDown" data-wow-iteration="1" data-wow-duration=".5s">

                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        data-wow-offset="0"><a href="{{ route('about-us') }}" class="nav-link">{{$pages['who_us']}}</a>
                    </li>

                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        data-wow-offset="0"><a href="{{ route('board-of-directors') }}" class="nav-link">{{$pages['board_members']}}</a>
                    </li>

                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        data-wow-offset="0"><a href="{{ route('general-assembly-members') }}" class="nav-link">
                            {{$pages['members_general_assembly']}}
                        </a>
                    </li>

                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        data-wow-offset="0"><a href="{{ route('working-team') }}" class="nav-link">{{$pages['our_team']}}</a>
                    </li>

                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        data-wow-offset="0"><a href="{{ route('organizational-chart') }}" class="nav-link">
                        {{$pages['organizational_chart']}}
                        </a>
                    </li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        data-wow-offset="0"><a href="{{ route('executive-manager') }}" class="nav-link"> التنفيذي</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('our-services') }}" @class(['nav-link', 'active' => request()->routeIs('our-services')])>{{$pages['services']}}</a>
            </li>

            <li class="nav-item" >
                <a href="{{ route('our-initiatives.index') }}" @class(['nav-link', 'active' => request()->routeIs('our-initiatives.index')])>{{$pages['initiatives']}}</a>
            </li>

            <li class="nav-item" id="ul-dropdown-Two">
                <a href="#" @class(['nav-link', 'active' => request()->routeIs('employment.index', 'volunteering.index', 'membership.index')])>{{$pages['join_us']}}</a>

                <ul class="ul-dropdown wow animate__fadeInDown" data-wow-iteration="1" data-wow-duration=".5s">

                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s">
                        <a href="{{ route('employment.index') }}" class="nav-link ">{{$pages['employment']}}</a>
                    </li>

                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"><a
                            href="{{ route('volunteering.index') }}" class="nav-link">{{$pages['volunteering']}}</a>
                    </li>

                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"><a
                            href="{{ route('membership.index') }}" class="nav-link ">{{$pages['membership']}}</a>
                    </li>
                </ul>
            </li>


            @if(\App\Models\Questionnaires::count())
            <li class="nav-item" id="ul-dropdown-Two">
                <a href="#" @class(['nav-link', 'active' => request()->routeIs('employment.index', 'volunteering.index', 'membership.index')])>{{$pages['questionnaires']}}</a>

                <ul class="ul-dropdown wow animate__fadeInDown" data-wow-iteration="1" data-wow-duration=".5s">
                    @foreach(\App\Models\Questionnaires::get() as $questionnair)
                        <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"><a
                                href="{{$questionnair->url}}" class="nav-link ">{{$questionnair->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @endif

            <li class="nav-item" id="ul-dropdown-Four" >
                <a href="#" @class(['nav-link', 'active' => request()->routeIs('news.index', 'events.index', 'pictures.index' , 'videos.index')])>{{$pages['media_center']}}</a>
                <ul class="ul-dropdown wow animate__fadeInDown" data-wow-iteration="1" data-wow-duration=".5s">
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"><a
                            href="{{ route('news.index') }}" class="nav-link ">
                            {{$pages['news']}}
                        </a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"><a
                            href="{{ route('events.index') }}" class="nav-link">
                            {{$pages['events']}}
                        </a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"><a
                            href="{{ route('pictures.index') }}" class="nav-link ">
                            {{$pages['images']}}
                        </a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"><a
                            href="{{ route('videos.index') }}" class="nav-link">
                            مكتبة الفيديو
                        </a></li>   
                </ul>
            </li>
            <li class="nav-item" id="ul-dropdown-Four">
                <a href="#" @class(['nav-link', 'active' => request()->routeIs('regulations-and-policies.index', 'operational-plans.index', 'activity-reports.index', 'financial-reports.index', 'public-records.index', 'disclosure-and-transparency.index', 'other-governance.index')])>{{$pages['governance']}}</a>
                <ul class="ul-dropdown wow animate__fadeInDown" data-wow-iteration="1" data-wow-duration=".5s"
                    style="visibility: visible; animation-duration: 0.5s; animation-iteration-count: 1; animation-name: fadeInDown;">
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        style="visibility: visible; animation-duration: 1.1s; animation-iteration-count: 1; animation-name: fadeIn;">
                        <a href="{{ route('regulations-and-policies.index') }}" class="nav-link">
                            {{$pages['regulations_policies']}}
                        </a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        style="visibility: visible; animation-duration: 1.1s; animation-iteration-count: 1; animation-name: fadeIn;">
                        <a href="{{ route('operational-plans.index') }}" class="nav-link ">{{$pages['operational_plans']}}</a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        style="visibility: visible; animation-duration: 1.1s; animation-iteration-count: 1; animation-name: fadeIn;">
                        <a href="{{ route('activity-reports.index') }}" class="nav-link">ت{{$pages['activity_reports']}}</a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        style="visibility: visible; animation-duration: 1.1s; animation-iteration-count: 1; animation-name: fadeIn;">
                        <a href="{{ route('financial-reports.index') }}" class="nav-link">{{$pages['financial_reports']}}</a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        style="visibility: visible; animation-duration: 1.1s; animation-iteration-count: 1; animation-name: fadeIn;">
                        <a href="{{ route('public-records.index') }}" class="nav-link">{{$pages['public_lecturer']}}</a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        style="visibility: visible; animation-duration: 1.1s; animation-iteration-count: 1; animation-name: fadeIn;">
                        <a href="{{ route('disclosure-and-transparency.index') }}" class="nav-link">{{$pages['disclosure_transparency']}}</a></li>
                    <li class="nav-item wow animate__fadeIn" data-wow-iteration="1" data-wow-duration="1.1s"
                        style="visibility: visible; animation-duration: 1.1s; animation-iteration-count: 1; animation-name: fadeIn;">
                        <a href="{{ route('other-governance.index') }}" class="nav-link">{{$pages['others']}}</a></li>
                </ul>
            </li>
        </ul>

        <div class="title">
            @auth
                    <a href="{{ route('backpack.account.info') }}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"style="color: {{ $generalSettings->primary_color }};box-shadow: 1px 12px 8px 0px #00000021;border-radius: 50%;border: 1px solid silver;">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </a>
            @endauth
            @if(!empty($generalSettings))
            <button class="btn btn-primary p-0" ><a
                    href="{{ $generalSettings->donations_store_url }}" class="p-0 nav-link text-light"><img src="{{asset("assets/images/icons8-get-cash-50.png")}}"
                                                              alt="">
                {{$pages['donate_with_us']}}
                </a></button>
            @endif
            @auth
                @hasrole('Admin')
                <button class="btn btn-primary btn-light-charity" >
                    <a href="{{ backpack_url('dashboard') }}" class="nav-link">لوحة التحكم</a>
                </button>
                @else
                    <button class="btn btn-primary btn-light-charity btn-logout p-0">
                        <a href="{{ route('backpack.auth.logout') }}" class="nav-link p-0">تسجيل خروج</a>
                    </button>
                @endhasrole
            @else
                <button class="btn btn-primary btn-light-charity" >
                    <a href="{{ route('backpack.auth.login') }}" class="nav-link">تسجيل الدخول</a>
                </button>
            @endauth
        </div>
    </div>
</nav><!--nav-->

{{------------------ Content ------------------}}
<main>
    @yield('content')
</main>

{{------------------ Footer ------------------}}
<footer>

     <li class="nav-item  footeer-one">
             <a class="nav-link"><img src="{{ $logo }}" alt=""></a>
     </li>
     <!-- footer contet start -->
        <div class="container-fluid px-sm-2 px-1">
            <div class="row justify-content-center gap-3 flex-xl-row flex-column w-100 align-items-center pb-5">
                <div class="col-12 col-xl-6 row gap-3 justify-content-center px-sm-2 px-0">
                    <div class="col-11 col-sm-5 mb-3">
                        <h6 class=" text-center pb-2">الروابط السريعة</h6>
                        <hr class="w-100 m-auto border-primary-web">
                        <div class="py-2 text-center">
                            <a class=" text-decoration-none py-2 text-center ps-1" href="{{ route('our-services') }}">{{$pages['services']}}
                        </a>
                        </div>
                        <div class="py-2 text-center">
                            <a class=" text-decoration-none py-2 text-center ps-1" href="{{ route('our-initiatives.index') }}">{{$pages['initiatives']}}</a>
                        </div>
                        <div class="py-2 text-center">
                            <a class=" text-decoration-none py-2 text-center ps-1" href="{{ route('contact-us.index') }}">تواصل معنا</a>
                        </div>
                    </div>
                    <div class="col-11 col-sm-5 mb-3">
                        <h6 class=" text-center pb-2">
                        مواقع التواصل الاجتماعي
                        </h6>
                        <hr class="m-auto border-primary-web">
                        <div class="p-0 p-lg-2 text-center">
                            <ul class="wow animate__fadeInRight px-2" data-wow-duration=".5s" data-wow-iteration="1" data-wow-offset="50"
                                style="visibility: visible; animation-duration: .5s; animation-iteration-count: 1; animation-name: fadeInRight;">
                                @foreach($social as $name => $link)
                                    @if(!empty($link))
                                        <li class="nav-item"><a target="_blank" href="{{$link}}" class="nav-link">
                                                <x-dynamic-component :component="'icons.'.$name"/>
                                            </a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 row justify-content-center">
                        <div class="col-12 col-sm-5 mb-3">
                            <h6 class="text-center pb-2">الاشتراك البريدي</h6>
                            <hr class="w-100 m-auto border-primary-web">
                        </div>
                        <div class="e-mail bg-transparent-custome shadow-none p-2  mt-0 row justify-content-center">
                            <div class="icon col-md-5 mb-md-0 mb-2 me-3 justify-content-end">

                                <h5>كن على معرفة بجديدنا</h5>
                            </div>
                            <div class="input wow animate__fadeInUp col justify-content-center" data-wow-duration="1s" data-wow-iteration="1"
                                    data-wow-offset="100">
                                <form class="d-flex gap-1 align-items-center justify-content-center" method="post" action="{{ route('mailing-list') }}">
                                    @csrf
                                    <input class="my-0" type="email" name="email" placeholder="البريد الإلكتروني">
                                    <button class="btn btn-primary m-0"><a class="nav-link">إشترك معنا</a></button>
                                </form>
                            </div><!--input-->
                        </div>
                    </div>
                </div>
                @if(!empty($social['google_maps_location']))
                <div class="col-12 col-xl-5 overflow-hidden mt-4 text-center ps-0">
                    <div class="iframe">
                        {!! $social['google_maps_location'] !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
     <!-- footer contet end -->
      <div class="row">
         <ul class="wow animate__fadeInRight" data-wow-duration=".5s" data-wow-iteration="1" data-wow-offset="50"
            style="visibility: visible; animation-duration: .5s; animation-iteration-count: 1; animation-name: fadeInRight;">
            <h5 class="mb-2 text-center">مواقع التواصل الاجتماعي</h5>
            @foreach($social as $name => $link)
                @if(!empty($link))
                    <li class="nav-item"><a target="_blank" href="{{$link}}" class="nav-link">
                            <x-dynamic-component :component="'icons.'.$name"/>
                        </a></li>
                @endif
            @endforeach
        </ul>
     </div>

    <p>جميع الحقوق محفوظة© {{ $generalSettings->charity_title }} <span class="d-block"><a href="{{ route('home') }}">جمعية عون التقنية</a> Powered by </span></p>
</footer>

{{------------------ Fixed ------------------}}
<button id="scrToR">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
         class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
        <path
            d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z"></path>
    </svg>
</button>

{{------------------ Scripts ------------------}}
<script src="{{asset("assets/js/scoll-on-top.js")}}"></script>
<script src="{{asset("assets/js/js-animashen/main.js")}}"></script>
<script src="{{asset("assets/js/main.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script src="{{asset("assets/js/all.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('scripts')
@stack('scripts')

</body>

</html>
