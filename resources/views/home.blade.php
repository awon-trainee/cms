@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .button-content-section {
            background-color: #ffffff;
        }

        .button-content-section .buttons {
            display: flex;
            justify-content: center;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow */
            border-radius: 5px;
            padding: 10px; /* Add padding to create space inside the border */
        }

        .button-content-section .btn {
            flex: 1; /* Ensure buttons take equal space */
            padding: 10px;
            font-size: 16px;
            background-color: #ffffff;
            border: 1px solid #000000; /* Directly set the border color */
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
            color: #000;
            margin: 0 10px; /* Add margin to create space between buttons */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow */
            cursor: pointer;
        }

        .button-content-section .btn.active {
            background-color: #8c5ab4;
            color: #ffffff;
        }

        .button-content-section .btn:hover {
            background-color: #0056b3 !important;
            color: #fff;
        }

        .button-content-section .contents .content {
            display: none;
            margin-top: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .button-content-section .contents .content h4 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .button-content-section .contents .content p {
            font-size: 18px;
            color: #000000;
        }

        .button-content-section .contents .content .goal,
        .vision-message-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow */
        }

        .button-content-section .contents .content .goal {
            display: inline-block;
            width: calc(33.33% - 30px);
            box-sizing: border-box;
        }

        .button-content-section .contents .content .vision-message-container .vision,
        .button-content-section .contents .vision-message-container .message,
        .button-content-section .contents .fields-container .field {
            display: inline-block;
            width: calc(50% - 20px);
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fields-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-top: 40px;
        }

        .field {
            background: #fff;
            border-radius: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 100px;
            height: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .field img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .field p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .fields-container::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: #3c51f5;
            z-index: -1;
        }

        @media (max-width: 600px) {
            .fields-container {
                flex-direction: column;
            }

            .field {
                margin-bottom: 20px;
            }

            .fields-container::before {
                height: 0;
            }
        }

        .vision-message-container {
            text-align: center;
        }
    </style>
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
                        <img class="position-relative" style="object-fit:@if($ad->filled_pic) fill @else cover @endif; height:35rem; width:100%" src="{{ asset($ad->image_url) }}" alt="ad-image">
                    </div>
                    <div class="title">
                        <h4>{{ $ad->title }}</h4>
                        <p>{{ $ad->description }}</p>
                    </div>
                    <div class="stat"></div>
                </section>
            @endforeach
        </div>
    @endif
    <!-- New section with buttons and content -->
    <div class="button-content-section mt-5">
        <div class="buttons">
            <button class="btn active" onclick="showContent('about', this)"> النبذة</button>
            <button class="btn" onclick="showContent('goals', this)"> الأهداف</button>
            <button class="btn" onclick="showContent('vision-message', this)"> الرؤية والرسالة</button>
            <button class="btn" onclick="showContent('fields', this)"> المجالات</button>
        </div>
        <div class="contents mt-3">
            <div id="about" class="content" style="display: block;">
                <h4><i class="fas fa-info-circle"></i> نبذة عنَا</h4>
                <p>محتوى الوصف التفصيلي للنبذه محتوى الوصف التفصيلي للنبذه. محتوى الوصف التفصيلي للنبذه. محتوى الوصف التفصيلي للنبذه. محتوى الوصف التفصيلي للنبذه.محتوى الوصف التفصيلي للنبذه.محتوى الوصف التفصيلي للنبذه.</p>
            </div>
            <div id="goals" class="content">
                <h4><i class="fas fa-bullseye"></i> أهدافنا</h4>
                <div class="goal">هدف 1</div>
                <div class="goal">هدف 2</div>
                <div class="goal">هدف 3</div>
                <div class="goal">هدف 4</div>
                <div class="goal">هدف 5</div>
                <div class="goal">هدف 6</div>
            </div>
            <div id="vision-message" class="content">
                <div class="vision-message-container">
                    <div class="vision">
                        <h4><i class="fas fa-eye"></i>  رؤيتنا  </h4>
                        <p>محتوى الرؤية</p>
                    </div>
                    <div class="message">
                        <h4>رسالتنا</h4>
                        <p>محتوى الرسالة</p>
                    </div>
                </div>
            </div>
            <div id="fields" class="content">
                <h4><i class="fas fa-layer-group"></i> مجالاتنا</h4>
                <div class="fields-container">
                    <div class="field">
                        <img src="icon1.png" alt="Icon 1">
                        <p>نص المجال الأول</p>
                    </div>
                    <div class="field">
                        <img src="icon2.png" alt="Icon 2">
                        <p>نص المجال الثاني</p>
                    </div>
                    <div class="field">
                        <img src="icon3.png" alt="Icon 3">
                        <p>نص المجال الثالث</p>
                    </div>
                    <div class="field">
                        <img src="icon4.png" alt="Icon 4">
                        <p>نص المجال الرابع</p>
                    </div>
                </div>
            </div><br>
        </div>
    </div>
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
                                                    <path d="M1.75308 24.5512C1.34419 24.552 0.947926 24.4096 0.63308 24.1487C0.455877 24.0018 0.309399 23.8213 0.202033 23.6177C0.0946673 23.4141 0.0285238 23.1913 0.00739099 22.9621C-0.0137418 22.7329 0.0105518 22.5018 0.0788796 22.282C0.147207 22.0622 0.258226 21.858 0.405579 21.6812L8.24558 12.3012L0.685581 2.90367C0.540215 2.72466 0.43166 2.51869 0.366154 2.2976C0.300649 2.07651 0.279484 1.84465 0.303878 1.61535C0.328272 1.38605 0.397741 1.16383 0.508295 0.961464C0.61885 0.7591 0.768308 0.58058 0.94808 0.436165C1.12915 0.276852 1.34119 0.156683 1.57089 0.0832025C1.8006 0.0097217 2.04302 -0.0154848 2.28294 0.00916379C2.52285 0.0338123 2.75508 0.107784 2.96505 0.226438C3.17501 0.345091 3.35819 0.505863 3.50308 0.698666L11.9556 11.1987C12.213 11.5118 12.3537 11.9046 12.3537 12.3099C12.3537 12.7153 12.213 13.108 11.9556 13.4212L3.20558 23.9212C3.03002 24.133 2.807 24.3004 2.55458 24.4098C2.30226 24.5193 2.02772 24.5677 1.75308 24.5512Z"
                                                          fill="{{ $generalSettings->secondary_color }}"/>
                                                </svg>
                                            </span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="news-carousel-control-next" type="button" data-bs-target="#newsCarousel"
                                                data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true">
                                                <svg width="13" height="25" viewBox="0 0 13 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.2469 0.448833C11.6558 0.44803 12.0521 0.590397 12.367 0.851295C12.5442 0.998189 12.6906 1.17866 12.798 1.38228C12.9054 1.5859 12.9715 1.80865 12.9926 2.03785C13.0137 2.26705 12.9894 2.49819 12.9211 2.718C12.8528 2.9378 12.7418 3.14201 12.5944 3.31883L4.75442 12.6988L12.3144 22.0963C12.4598 22.2753 12.5683 22.4813 12.6338 22.7024C12.6994 22.9235 12.7205 23.1554 12.6961 23.3847C12.6717 23.614 12.6023 23.8362 12.4917 24.0385C12.3812 24.2409 12.2317 24.4194 12.0519 24.5638C11.8709 24.7231 11.6588 24.8433 11.4291 24.9168C11.1994 24.9903 10.957 25.0155 10.7171 24.9908C10.4772 24.9662 10.2449 24.8922 10.035 24.7736C9.82499 24.6549 9.64181 24.4941 9.49692 24.3013L1.04442 13.8013C0.787028 13.4882 0.646317 13.0954 0.646317 12.6901C0.646317 12.2847 0.787028 11.892 1.04442 11.5788L9.79442 1.07883C9.96998 0.867054 10.193 0.699642 10.4454 0.590181C10.6977 0.480721 10.9723 0.432295 11.2469 0.448833Z"
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
        // Add active class to first carousel item
        if(document.querySelector('.carousel-item')){
            document.querySelector('.carousel-item').classList.add('active');
        }

        // Remove all-to from last element which has all-to
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
                confirmButtonText: 'تم'
            })
            @endif

            @if(session('error'))
            Swal.fire({
                icon: 'error',
                text: 'البريد الإلكتروني مسجل مسبقا',
                confirmButtonText: 'تم'
            })
            @endif
        });

        function showContent(contentId, btn) {
            // Hide all contents
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => content.style.display = 'none');

            // Remove active class from all buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => button.classList.remove('active'));

            // Show the selected content
            document.getElementById(contentId).style.display = 'block';

            // Add active class to the clicked button
            btn.classList.add('active');
        }
    </script>
@endpush
