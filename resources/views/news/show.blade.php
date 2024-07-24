@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .news-title {
            font-size: 24px;
            font-weight: bold;
            color: rgba(var(--secondary-charity-color), 1) !important;
            margin-bottom: 12px;
        }

        .news-date{
            margin-top: 130px;
            display: flex;
            align-items: center;
            gap: 5px;
            color: #5A5656;
            margin-bottom: 12px;
        }

        .news-content {
            margin-top: 20px;
            line-height: 1.6;
            color: #5A5656;
        }

        .owl-carousel .item {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 400px; /* تعديل العرض */
            height: 300px; /* تعديل الارتفاع */
            overflow: hidden; /* لإخفاء الأجزاء الزائدة من الصور */
            border-radius: 15px; /* إضافة انحناء للصندوق */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0); /* إضافة ظل للصندوق */
            margin: auto; /* تعديل لمركزية الصندوق */
        }

        .owl-carousel .item img {
            width: 100%; /* ملء عرض الصندوق */
            height: 100%; /* ملء ارتفاع الصندوق */
            object-fit: cover; /* ملء الصورة مع الحفاظ على النسبة */
            border-radius: 15px; /* إضافة انحناء للصورة لتتطابق مع الصندوق */
        }

        .news-dates {
            text-align: right;
            margin-bottom: 10px;
        }

        .news-dates .news-date {
            display: inline-flex;
            margin-left: 15px;
        }

        .news-location {
            text-align: right;
            margin-bottom: 20px;
            font-weight: bold;
            color: rgba(var(--secondary-charity-color), 1) !important;
        }

        .btn-custom {
            background-color: rgba(var(--secondary-charity-color), 1) !important;
            border-color: rgba(var(--secondary-charity-color), 1) !important;
            color: white !important;
        }

        .btn-custom:hover {
            background-color: rgba(var(--secondary-charity-color), 0.9) !important;
            border-color: rgba(var(--secondary-charity-color), 0.9) !important;
        }

        .additional-images-title {
            color: rgba(var(--secondary-charity-color), 1) !important;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            gap: 2rem;
            justify-content: center;
            place-items: center !important;
        }

        .additional-images-title img {
            width: 65px;
            height: 65px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-6">
        <div class="row mt-3">
            <div class="col-12">
                <div class="news-dates">
                    <div class="news-date">
                        <img src="{{ asset('assets/images/qualification-icon/calendar.svg') }}" alt="calendar">
                        <span>{{ $news->created_at->locale('ar')->translatedFormat('d M Y') }}</span>
                    </div>
                </div>
                <h5 class="news-title">{{ $news->title }}</h5>
                <p class="news-content">{{ $news->content }}</p>
                <div class="news-time">
                    <span>{{ $news->created_at->locale('ar')->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <h5 class="additional-images-title">
                    <img src="{{ asset('assets/icons/images.png') }}" alt="الصور الإضافية">
                    <p>
                        صور الخبر
                    </p>
                </h5>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    @foreach($news->images as $image)
                        <div class="item">
                            <a href="{{ $image->image_url }}">
                                <img src="{{ $image->image_url }}" alt="" class="img-fluid rounded-4 mb-2">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mt-4 pb-5">
            <div class="col-12 text-center">
                <a href="{{ route('news.index') }}" class="btn btn-custom">العودة للأخبار</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var imageCount = {{ $news->images->count() }};
            var itemsToShow = imageCount;

            $('.owl-carousel').owlCarousel({
                loop: imageCount > 1,
                nav: true,
                rtl: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                dots: true,
                items: itemsToShow,
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: itemsToShow < 2 ? itemsToShow : 2
                    },
                    1000: {
                        items: itemsToShow
                    }
                }
            });
        });
    </script>
@endpush