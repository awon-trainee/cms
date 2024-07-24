@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bank.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
@endpush

@section('content')
    {{------------------ Hero ------------------}}
    @if($pageSettings->show_ads)
        <div class="owl-carousel owl-theme bg-charity-light">
            @foreach($ads as $ad)
                <section class="Main-address wow"
                         data-wow-duration="1s"
                         data-wow-iteration="1" data-wow-offset="1">
                    <div class="desgin">
                        <!-- objectfit: fill or cover -->
                        <!-- height and width from admin dashboard -->
                        <img class="position-relative" style="object-fit:@if($ad->filled_pic) fill @else cover @endif; height:35rem; width:100%" src="{{ asset($ad->image_url) }}" alt="ad-image">
                    </div><!--desgin-->
                    <div class="title" style="display:@if(($ad->title && $ad->description) || ($ad->title || $ad->description)) block @else none @endif;">
                        <h4>{{ $ad->title }}</h4>
                        <p>{{ $ad->description }}</p>
                    </div>
                    <div class="stat"></div>

                </section>
            @endforeach
        </div>
    @endif

    <div class="button-content-section mx-auto mt-5">
        <div class="buttons">
            <button class="btn active" onclick="showContent('about', this)"> النبذة</button>
            <button class="btn" onclick="showContent('goals', this)"> الأهداف</button>
            <button class="btn" onclick="showContent('vision-message', this)"> الرؤية والرسالة</button>
            <button class="btn" onclick="showContent('fields', this)"> المجالات</button>
        </div>
        <div class="contents mt-3">
            <div id="about" class="content" style="display: block;">
                <div class="d-flex align-items-end title">
                    <img src="{{ asset("assets/icons/about-us.svg") }}" alt="About Icon" />
                    <h4>نبذه عنّا</h4>
                </div>
                <p style="white-space:pre-wrap;">{{ $generalSettings->brief }}</p>
            </div>
            <div id="goals" class="content">
                <div class="d-flex align-items-end title">
                    <img src="{{ asset("assets/icons/goals.svg") }}" alt="Goals Icon" />
                    <h4>أهدافنا</h4>
                </div>
                <div class="goals-content">
                    <div class="goal d-flex align-items-center">
                        <div class="text-center rounded-3">1</div>
                        <p style="white-space:pre-wrap;">محتوى الهدف الأول ، محتوى الهدف الأول ، محتوى الهدف الأول .</p>
                    </div>
                </div>
            </div>
            <div id="vision-message" class="content">
                <div class="vision-message-container">
                    <div class="vision">
                        <div class="d-flex title align-items-center">
                            <img src="{{ asset("assets/icons/vision.svg") }}" alt="Vision Icon" />
                            <h4>رؤيتنا</h4>
                        </div>
                        <p style="white-space:pre-wrap;">{{ $generalSettings->vision }}</p>
                    </div>
                    <div class="message">
                        <div class="d-flex title align-items-end">
                            <img src="{{ asset("assets/icons/message.svg") }}" alt="Message Icon" />
                            <h4>رسالتنا</h4>
                        </div>
                        <p style="white-space:pre-wrap;">{{ $generalSettings->message }}</p>
                    </div>
                </div>
            </div>
            <div id="fields" class="content">
                <div class="d-flex title align-items-center">
                    <img src="{{ asset("assets/icons/majalat.svg") }}" alt="Fields Icon" />
                    <h4>مجالاتنا</h4>
                </div>
                <svg width="1000" height="102" viewBox="0 0 1477 102" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 51L15.75 44.7209L30.5 38.5409L45.25 32.5574L60 26.8647L74.75 21.5526L89.5 16.705L104.25 12.3982L119 8.70013L133.75 5.6692L148.5 3.35315L163.25 1.78853L178 1H192.75L207.5 1.78853L222.25 3.35315L237 5.6692L251.75 8.70013L266.5 12.3982L281.25 16.705L296 21.5526L310.75 26.8647L325.5 32.5574L340.25 38.5409L355 44.7209L369.75 51L384.5 57.2791L399.25 63.4591L414 69.4426L428.75 75.1353L443.5 80.4474L458.25 85.295L473 89.6018L487.75 93.2999L502.5 96.3308L517.25 98.6468L532 100.211L546.75 101H561.5L576.25 100.211L591 98.6468L605.75 96.3308L620.5 93.2999L635.25 89.6018L650 85.295L664.75 80.4474L679.5 75.1353L694.25 69.4426L709 63.4591L723.75 57.2791L738.5 51L753.25 44.7209L768 38.5409L782.75 32.5574L797.5 26.8647L812.25 21.5526L827 16.705L841.75 12.3982L856.5 8.70013L871.25 5.6692L886 3.35315L900.75 1.78853L915.5 1L930.25 1L945 1.78853L959.75 3.35315L974.5 5.6692L989.25 8.70013L1004 12.3982L1018.75 16.705L1033.5 21.5526L1048.25 26.8647L1063 32.5574L1077.75 38.5409L1092.5 44.7209L1107.25 51L1122 57.2791L1136.75 63.4591L1151.5 69.4426L1166.25 75.1353L1181 80.4474L1195.75 85.295L1210.5 89.6018L1225.25 93.2999L1240 96.3308L1254.75 98.6468L1269.5 100.211L1284.25 101H1299L1313.75 100.211L1328.5 98.6468L1343.25 96.3308L1358 93.2999L1372.75 89.6018L1387.5 85.295L1402.25 80.4474L1417 75.1353L1431.75 69.4426L1446.5 63.4591L1461.25 57.2791L1476 51" stroke="rgba(var(--primary-charity-color), 1)"/>
                </svg>
                <div class="fields-container">
                    @foreach($fields as $field)
                    <div class="field">
                        <img src="{{ $field->icon_url }}" alt="Icon 1">
                        <p style="white-space:pre-wrap;">{{ $field->title }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <br />
        </div>
    </div>

    <div class="viergein oe viergein-two" style="display:@if(sizeof($banks) > 0) block @else none @endif;">
        <div class="all der-3 wow animate__slideInUp" data-wow-duration=".5s" data-wow-iteration="1" id="sma1">
            <div class="title ps-5 mt-5">
                <h4>حساباتنا البنكية</h4>
            </div>
            <div class="bank-container">
                <div class="bank-logo-wrapper">
                    <div class="bank-logo">
                        @if($first_bank && $first_bank->image_url)
                            <img id="bankImage" src="{{ $first_bank->image_url }}" alt="bank logo">
                        @else
                            <img id="bankImage" src="" alt="bank logo">
                        @endif
                    </div>
                </div>
                <div class="account-info">
                    <div class="bank-label">
                        <span>اسم المصرف:</span>
                        <div class="select-container">
                            <select id="bankSelect" onchange="showAccountDetails()">
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->id }}" id="bankName" data-image="{{ $bank->image_url }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="account-details">
                        <p>
                            <strong>اسم الحساب:</strong>
                            @if($first_bank && $first_bank->account_name)
                                <span id="accountName">{{ $first_bank->account_name }}</span>
                            @else
                                <span id="accountName"></span>
                            @endif
                        </p>
                        <p>
                            <strong>رقم الحساب:</strong>
                            @if($first_bank && $first_bank->account_number)
                                <span id="accountNumber">{{ $first_bank->account_number }}</span>
                            @else
                                <span id="accountNumber"></span>
                            @endif

                        </p>
                        <p>
                            <strong>رقم الايبان:</strong>
                            @if($first_bank && $first_bank->iban)
                                <span id="ibanNumber">{{ $first_bank->iban }}</span>
                            @else
                                <span id="ibanNumber"></span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <div class="viergein oe viergein-two">
        <div class="all der-3 wow animate__slideInUp" data-wow-duration=".5s" data-wow-iteration="1" id="sma1">
            <div class="title ps-5 mt-5">
                <h4>أبرز مشاريعنا</h4>
            </div>
        </div>
        <div class="list-of-projects">
            {{------------------ card of project ------------------}}
            @foreach($projects as $project)
                <div class="card">
                    <div class="card-content">
                        <img src="{{ $project->image_url }}" alt="Card Image">
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->content }}</p>
                    </div>
                </div>
            @endforeach
                {{------------------ card of project ------------------}}
        </div>
        
        @if($pageSettings->show_statistics)
            <div class="all der-3 wow animate__slideInUp" data-wow-duration=".5s" data-wow-iteration="1" id="sma1">
                <div class="title ps-5">
                    <h4>إنجازاتنا في أرقام</h4>
                    <p>نفخر في العديد من الإنجازات ومن أهمها:</p>
                </div>
            </div>
            <div class="all-enjazat as wow animate__slideInRight" data-wow-duration=".7s" data-wow-iteration="1">
                @foreach($statistics as $statistic)
                    <div class="mt-4 all all-to all-Two d-inline-block me-4" id="all-two">
                        <div class="title s position-relative">
                            <div class="Stings">
                                @if($statistic->icon)
                                    <img class="p-0 im-res" src="{{ $statistic->icon_url }}" alt="{{ $statistic->title }}" width="120">
                                @else
                                    <x-icons.flag/>
                                @endif
                            </div>
                            <h3>+{{ $statistic->value }}</h3>
                        </div>
                        <p class="p-0 m-0 mw-100">{{ $statistic->title }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        @if($pageSettings->show_news)
            <div class="all-five sc wow animate__slideInLeft" data-wow-duration=".3s" data-wow-offset="600" id="sma1">
                <div class="title new-s-2 wow animate__slideInLeft" data-wow-duration=".2s"
                     data-wow-offset="-50">
                    <h4>آخر أخبارنا</h4>
                    <p>آخر أخبار الجمعية:</p>
                </div>
                <div id="newsCarousel" class="carousel slide mt-4 mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner pe-3">
                        @foreach($latest_news as $news)
                            <div class="carousel-item ">
                                <div class="row align-items-center">
                                    <div class="col p-0">
                                        <div class="image" style="background-image: url({{ $news->mainImage->image_url }});"></div>
                                    </div>
                                    <div class="col p-0 carousel-content d-flex align-items-center">
                                        <div class="position-absolute control-button d-sm-block">
                                            <button class="news-carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true">
                                                    <svg width="13" height="25" viewBox="0 0 13 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.75308 24.5512C1.34419 24.552 0.947926 24.4096 0.63308 24.1487C0.455877 24.0018 0.309399 23.8213 0.202033 23.6177C0.0946673 23.4141 0.0285238 23.1913 0.00739099 22.9621C-0.0137418 22.7329 0.0105518 22.5018 0.0788796 22.282C0.147207 22.0622 0.258226 21.858 0.405579 21.6812L8.24558 12.3012L0.685581 2.90367C0.540215 2.72466 0.43166 2.51869 0.366154 2.2976C0.300649 2.07651 0.279484 1.84465 0.303878 1.61535C0.328272 1.38605 0.397741 1.16383 0.508295 0.961464C0.61885 0.7591 0.768308 0.58058 0.94808 0.436165C1.12915 0.276852 1.34119 0.156683 1.57089 0.0832025C1.8006 0.0097217 2.04302 -0.0154848 2.28294 0.00916379C2.52285 0.0338123 2.75508 0.107784 2.96505 0.226438C3.17501 0.345091 3.35819 0.505863 3.50308 0.698666L11.9556 11.1987C12.213 11.5118 12.3537 11.9046 12.3537 12.3099C12.3537 12.7153 12.213 13.108 11.9556 13.4212L3.20558 23.9212C3.03002 24.1329 2.80702 24.3004 2.55465 24.4098C2.30228 24.5193 2.02767 24.5677 1.75308 24.5512Z"
                                                          fill="{{ $generalSettings->secondary_color }}"/>
                                                    </svg>
                                                </span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="news-carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true">
                                                    <svg width="13" height="25" viewBox="0 0 13 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.2469 0.448833C11.6558 0.448034 12.0521 0.590441 12.3669 0.851334C12.5441 0.998245 12.6906 1.17867 12.798 1.38228C12.9053 1.58589 12.9715 1.80867 12.9926 2.03788C13.0137 2.26709 12.9894 2.49822 12.9211 2.71803C12.8528 2.93783 12.7418 3.142 12.5944 3.31883L4.75442 12.6988L12.3144 22.0963C12.4598 22.2753 12.5683 22.4813 12.6338 22.7024C12.6994 22.9235 12.7205 23.1554 12.6961 23.3847C12.6717 23.614 12.6023 23.8362 12.4917 24.0385C12.3812 24.2409 12.2317 24.4194 12.0519 24.5638C11.8709 24.7231 11.6588 24.8433 11.4291 24.9168C11.1994 24.9903 10.957 25.0155 10.7171 24.9908C10.4772 24.9662 10.2449 24.8922 10.035 24.7736C9.82499 24.6549 9.64181 24.4941 9.49692 24.3013L1.04442 13.8013C0.787028 13.4882 0.646317 13.0954 0.646317 12.6901C0.646317 12.2847 0.787028 11.892 1.04442 11.5788L9.79442 1.07883C9.96998 0.867054 10.193 0.699642 10.4454 0.590181C10.6977 0.480721 10.9723 0.432295 11.2469 0.448833Z"
                                                          fill="{{ $generalSettings->secondary_color }}"/>
                                                    </svg>
                                                </span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div class="title d-inline-block w-100">
                                            <div>
                                                <h3>{{ $news->title }}</h3>
                                                <p class="m-0 mw-100">{{ Str::limit($news->content, 100) }}</p>
                                                <button class="btn btn-primary btn-charity mt-3" type="button">
                                                    <a href="{{ route('news.show', $news->id) }}" class="nav-link text-light">قراءة</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($pageSettings->show_partners)
            <div class="shrka wow animate__backInDown" data-wow-duration=".9s" data-wow-iteration="1" data-wow-offset="-50">
                <div class="title sark-all">
                    <h4>شركاؤنا</h4>
                </div>
                <div class="shrkat justify-content-center">
                    @foreach($partners as $partner)
                        <div class="item d-flex justify-content-center">
                            <a class="nav-link w-100">
                                <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
<x-buttons.contact-us/>
@push('scripts')
    <script src="{{ asset('assets/js/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        // add active class to first carousel item
        if(document.querySelector('.carousel-item')){
            document.querySelector('.carousel-item').classList.add('active');
        }

        // remove all-to from last element which has all-to
        if(document.querySelector('.all-to')) {
            Array.from(document.querySelectorAll('.all-to')).pop().classList.remove('all-to');
        }

        window.addEventListener('load', function () {

            if($('.owl-carousel').length) {
                $('.owl-carousel').owlCarousel({
                    loop: true,
                    nav: false,
                    rtl: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    dots: false,
                    items: 1,
                })
            }

            @if(session('success'))
            Swal.fire({
                icon: 'success',
                text: 'تم الإشتراك بنجاح',
                showConfirmButton: false,
                timer: 1500
            })
            @endif
            @error('email')
            Swal.fire({
                icon: 'error',
                text: '{{ $message }}',
                showConfirmButton: false,
                timer: 1500
            })
            @endif
        });
    </script>

    <script>
        function showAccountDetails() {
            let selectedBankId = document.getElementById("bankSelect").value;
            let selectedBank = @json($banks).find(bank => bank.id == selectedBankId);
            let selectedImage = document.getElementById("bankSelect").options[document.getElementById("bankSelect").selectedIndex].getAttribute('data-image');

            document.getElementById("accountName").textContent = selectedBank.account_name;
            document.getElementById("accountNumber").textContent = selectedBank.account_number;
            document.getElementById("ibanNumber").textContent = selectedBank.iban;

            document.getElementById("bankImage").src = selectedImage;
            document.getElementById("bankImage").alt = selectedBank.bank_name;
        }

        function showContent(contentId, element) {
        // Hide all content divs
        var contents = document.querySelectorAll('.content');
        contents.forEach(function(content) {
            content.style.display = 'none';
        });
        // Remove active class from all buttons
        var buttons = document.querySelectorAll('.btn');
        buttons.forEach(function(button) {
            button.classList.remove('active');
        });
        // Show the clicked content and add active class to the clicked button
        document.getElementById(contentId).style.display = 'block';
        element.classList.add('active');
    }
    </script>
@endpush

<style>
    .card {
      width: 337px !important;
      height: 530px !important;
      background-color: rgba(var(--secondary-charity-color), 0.1) !important;
      border-radius: 10px !important;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .card-content h3 {
      font-size: 18px;
      font-weight: bold;
      margin-top: 15px;
      margin-right: 38px;
    }

    .card-content p {
      font-size: 14px;
      color: #666;
      margin-top: 15px;
      margin-right: 38px !important;
    }

    .card-content img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      margin-bottom: 16px;
    }

    /* Button styles */
    .card-content button {
      display: block;
      margin-right: auto;
      margin-left: auto;
      /* width: 100%; */
      padding: 12px 24px;
      background-color: #6c63ff;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }

    .link img {
        width: auto;
        height: 1.5rem;
    }

    .link {
        margin-right: 38px;
        align-items: center;
        gap: 0.5rem;
    }

    .link a {
        text-decoration: none;
    }

    .link span {
        color: rgba(var(--primary-charity-color), 1);
        font-size: 16px;
        font-weight: bold;
    }

    .btn-join form a {
        width: 123px;
        border-radius: 5px;
        background-color: white !important;
        color: rgba(var(--primary-charity-color), 1) !important;
        margin: 6rem;
    }
  </style>