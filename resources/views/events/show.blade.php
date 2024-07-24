@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .event-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 120px;
            padding-bottom: 21px;
            color: rgba(var(--secondary-charity-color), 1) !important;
        }

        .event-date,
        .event-duration {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            font-weight: medium;
            color: #5A5656;
        }

        .event-content {
            color: #5A5656;
            margin-top: 20px;
            line-height: 1.6;
        }

        .owl-carousel .item {
            margin: 10px;
            width: 100%;
            max-width: 400px; /* تعيين عرض ثابت */
            height: 300px; /* تعيين ارتفاع ثابت */
        }

        .owl-carousel .item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* تغطية العنصر بالكامل مع الحفاظ على نسبة العرض إلى الارتفاع */
            border-radius: 10px; /* حواف دائرية */
        }

        .event-dates {
            text-align: right;
            margin-bottom: 10px;
        }

        .event-dates .event-date {
            display: inline-flex;
            margin-left: 15px;
        }

        .event-location {
            text-align: right;
            margin-bottom: 20px;
            font-weight: bold;
            color: #5A5656;
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
                <h5 class="event-title">{{ $event->title }}</h5>
                <div class="event-dates">
                    <div class="event-date">
                        <img src="{{ asset('assets/images/qualification-icon/calendar.svg') }}" alt="calendar" />
                        <span>تاريخ بداية الفعالية: {{ \Carbon\Carbon::parse($event->start_date)->locale('ar')->translatedFormat('d M Y') }}</span>
                    </div>
                    <div class="event-date">
                        <img src="{{ asset('assets/images/qualification-icon/calendar.svg') }}" alt="calendar" />
                        <span>تاريخ نهاية الفعالية: {{ \Carbon\Carbon::parse($event->end_date)->locale('ar')->translatedFormat('d M Y') }}</span>
                    </div>
                </div>
                <div class="event-location">
                    <!-- <i class="fa-solid fa-location-dot"></i> -->
                    <img src="{{ asset('assets/images/qualification-icon/location.svg') }}" alt="location" />
                    <span>{{ $event->location }}</span>
                </div>
                <p class="event-content">{{ $event->content }}</p>
                <div class="event-duration">
                    <span>{{ $event->created_at->locale('ar')->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <h5 class="additional-images-title">
                    <img src="{{ asset('assets/icons/images.png') }}" alt="الصور الإضافية">
                    <p>
                        الصور الإضافية
                    </p>
                </h5>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    @foreach($event->images as $image)
                        <div class="item">
                            <a href="{{ $image->image_url }}">
                                <img src="{{ $image->image_url }}" alt="" class="img-fluid rounded-4 mb-2">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center py-5">
                <a href="{{ route('events.index') }}" class="btn btn-custom">العودة للفعاليات</a>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var imageCount = {{ $event->images->count() }};
            var itemsToShow = imageCount;

            $('.owl-carousel').owlCarousel({
                loop: imageCount > 1,
                nav: true,
                rtl: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                dots: false,
                margin: 15,
                navText: [
                    '<i class="fas fa-chevron-left fa-2x text-secondary"></i>',
                    '<i class="fas fa-chevron-right fa-2x text-secondary"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: itemsToShow
                    }
                }
            });
        });
    </script>
@endpush