@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .event-title {
            font-size: 24px;
            font-weight: bold;
            color: rgba(var(--secondary-charity-color), 1) !important;
        }

        .event-date,
        .event-duration {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .event-content {
            margin-top: 20px;
            line-height: 1.6;
        }

        .owl-carousel .item {
            margin: 10px;
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
        }
    </style>
@endpush

@section('content')

    <div class="container mt-6">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="text-dark w-100" style="color: rgba(var(--secondary-charity-color), 1) !important;">الفعاليات</h4>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <h5 class="event-title">{{ $event->title }}</h5>
                <div class="event-dates">
                    <div class="event-date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3-week" viewBox="0 0 16 16">
                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                            <path d="M12 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-5 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2-3a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        <span>تاريخ البداية: {{ \Carbon\Carbon::parse($event->start_date)->locale('ar')->translatedFormat('d M Y') }}</span>
                    </div>
                    <div class="event-date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3-week" viewBox="0 0 16 16">
                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                            <path d="M12 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-5 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2-3a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        <span>تاريخ النهاية: {{ \Carbon\Carbon::parse($event->end_date)->locale('ar')->translatedFormat('d M Y') }}</span>
                    </div>
                </div>
                <div class="event-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>{{ $event->location }}</span>
                </div>
                <p class="event-content">{{ $event->content }}</p>
                <div class="event-duration">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 1 .5.5v4.793l3.146 3.147a.5.5 0 0 1-.708.708l-3.147-3.147A.5.5 0 0 1 7.5 8V4a.5.5 0 0 1 .5-.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0 1A9 9 0 1 1 8 0a9 9 0 0 1 0 18z"/>
                    </svg>
                    <span>منذ: {{ $event->created_at->locale('ar')->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <h5 class="additional-images-title">
                    <i class="fas fa-image"></i>
                    الصور الإضافية
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
            <div class="col-12 text-center">
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