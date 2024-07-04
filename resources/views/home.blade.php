@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bank.css') }}">
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
                    <div class="title">
                        <h4>{{ $ad->title }}</h4>
                        <p>{{ $ad->description }}</p>
                    </div>
                    <div class="stat"></div>

                </section>
            @endforeach
        </div>
    @endif
    @if($pageSettings->show_vision_and_message)
        <div class="viergein wow animate__slideInRight bg-charity-light" data-wow-duration="1s" data-wow-iteration="1"
             data-wow-offset="200">
            <div class="all wow animate__fadeInDown" data-wow-duration=".5s" data-wow-iteration="1" data-wow-offset="20"
                 id="sma">
                <div class="title">
                    <div class="Stings">
                        <x-icons.vision/>
                    </div>
                    <h4>الرؤية</h4>
                </div>
                <p>{{ $generalSettings->vision }}</p>
            </div>

            <div class="all all-Two">
                <div class="title">
                    <div class="Stings">
                        <x-icons.flag/>
                    </div>
                    <h4>الرسالة</h4>
                </div>
                <p>{{ $generalSettings->message }}</p>
            </div>
        </div>
    @endif

    <section class="bank-section">
    <h1 class="title">حساباتنا البنكية</h1>
    <div class="container">
        <div>
            <label for="bankSelect">اسم المصرف:</label>
                <select name="bankSelect" id="bankSelect" onchange="showAccountDetails()">
                    @foreach($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                    @endforeach
            </select>
        </div>
        <div class="account-info">
            <div class="details">
                <div>
                    <p>اسم المصرف: </p>
                    <p id="bankName">{{ $first_bank->bank_name }}</p>
                </div>
                <div>
                    <p>اسم الحساب: </p>
                    <p id="accountName">{{ $first_bank->account_name }}</p>
                </div>
                <div>
                    <p>رقم الحساب: </p>
                    <p id="accountNumber">{{ $first_bank->account_number }}</p>
                </div>
                <div>
                    <p>رقم الآيبان: </p>
                    <p id="ibanNumber">{{ $first_bank->iban }}</p>
                </div>
            </div>
            <div class="bank-logo">
                <img id="bankImage" src="{{ $first_bank->iban }}" alt="{{ $first_bank->account_name }}">
            </div>
        </div>
    </div>
    </section>

    {{------------------ Projects section ------------------}}
    <div class="viergein oe viergein-two">
        <div class="all der-3 wow animate__slideInUp" data-wow-duration=".5s" data-wow-iteration="1" id="sma1">
            <div class="title ps-5 text-center mt-5">
                <h4>أبرز مشاريعنا</h4>
            </div>
            <div class="list-of-projects">
                {{------------------ card of project ------------------}}
                @foreach($projects as $project)
                <div class="card shadow rounded-3" style="width: 759px; height: 519px;">
                    <div style="width: 759px; height: 254px;">
                        <img src="{{ $project->image }}" class="card-img-top w-100 h-100 object-fit-contain" alt="{{ $project->title }}" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold fs-5"> {{ $project->title }} </h5>
                        <p class="card-text me-0 mw-0 fs-6 lh-lg">{{ $project->content }}</p>
                    </div>
                </div>
                @endforeach
                {{------------------ card of project ------------------}}
            </div>
        </div>
    </div>                            
    {{------------------ Projects section ------------------}}

    <div class="viergein oe viergein-two">
        @if($pageSettings->show_statistics)
            <div class="all der-3 wow animate__slideInUp" data-wow-duration=".5s" data-wow-iteration="1"
                 id="sma1">
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
            <div class="all-five sc wow animate__slideInLeft" data-wow-duration=".3s"
                 data-wow-offset="600" id="sma1">

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
                                <div class="image" style="background-image: url({{ $news->mainImage->image_url }});">

                                </div>
                                </div>
                                <div class="col p-0 carousel-content d-flex align-items-center">
                                    <div class="position-absolute control-button d-sm-block">
                                        <button class="news-carousel-control-prev" type="button" data-bs-target="#newsCarousel"
                                                data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true">
                                                <svg width="13" height="25" viewBox="0 0 13 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.75308 24.5512C1.34419 24.552 0.947926 24.4096 0.63308 24.1487C0.455877 24.0018 0.309399 23.8213 0.202033 23.6177C0.0946673 23.4141 0.0285238 23.1913 0.00739099 22.9621C-0.0137418 22.7329 0.0105518 22.5018 0.0788796 22.282C0.147207 22.0622 0.258226 21.858 0.405579 21.6812L8.24558 12.3012L0.685581 2.90367C0.540215 2.72466 0.43166 2.51869 0.366154 2.2976C0.300649 2.07651 0.279484 1.84465 0.303878 1.61535C0.328272 1.38605 0.397741 1.16383 0.508295 0.961464C0.61885 0.7591 0.768308 0.58058 0.94808 0.436165C1.12915 0.276852 1.34119 0.156683 1.57089 0.0832025C1.8006 0.0097217 2.04302 -0.0154848 2.28294 0.00916379C2.52285 0.0338123 2.75508 0.107784 2.96505 0.226438C3.17501 0.345091 3.35819 0.505863 3.50308 0.698666L11.9556 11.1987C12.213 11.5118 12.3537 11.9046 12.3537 12.3099C12.3537 12.7153 12.213 13.108 11.9556 13.4212L3.20558 23.9212C3.03002 24.1329 2.80702 24.3004 2.55465 24.4098C2.30228 24.5193 2.02767 24.5677 1.75308 24.5512Z"
                                                          fill="{{ $generalSettings->secondary_color }}"/>
                                                </svg>
                                            </span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="news-carousel-control-next" type="button" data-bs-target="#newsCarousel"
                                                data-bs-slide="next">
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
        <div class="shrka wow animate__backInDown" data-wow-duration=".9s" data-wow-iteration="1"
             data-wow-offset="-50">
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
            const selectedBankId = document.getElementById("bankSelect").value;
            const selectedBank = @json($banks).find(bank => bank.id == selectedBankId);

            document.getElementById("bankName").textContent = selectedBank.bank_name;
            document.getElementById("accountName").textContent = selectedBank.account_name;
            document.getElementById("accountNumber").textContent = selectedBank.account_number;
            document.getElementById("ibanNumber").textContent = selectedBank.iban;
            document.getElementById("bankImage").src = selectedBank.image;
            document.getElementById("bankImage").alt = selectedBank.bank_name;
        }
    </script>
@endpush
