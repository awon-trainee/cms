@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
@endpush
@section('content')

    <div class="all-secshen mt-6 ">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all ">
                <div class="title text-center">
                    <h4 class="text-dark w-100">الفعاليات</h4>
                </div><!--title-->
            </div>
            <div class="all-edara calman one two">
                <div class="title">
                    <div class="data">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-calendar3-week border-0 rounded-0" viewBox="0 0 16 16">
                            <path
                                d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                            <path
                                d="M12 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-5 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2-3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-5 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg> {{ $event->created_at->locale('ar')->translatedFormat('d M Y') }}م
                    </div>
                    <h5>{{ $event->title }}</h5>
                        <p class="card-text m-0">{{ $event->content }}</p>
                </div>
                <div class="img-servicse">

                    <div class="d-block" id="gallery">
                        <a href="{{ $event->mainImage?->image_url }}">
                            <img src="{{ $event->mainImage?->image_url }}" alt="" class="img-fluid rounded-4 mb-2">
                        </a>
                        </div>
                        <div class="owl-carousel owl-theme">
                            @foreach($event->images as $image)
                                @continue($loop->first)
                                <a href="{{ $image->image_url }}">
                                    <img src="{{ $image->image_url }}" alt="" class="img-fluid rounded-4 mb-2">
                                </a>
                            @endforeach
                    </div>

                </div>
                <div class="col-12" id="gallery">
                        <button class="btn btn-primary my-2 button-2   wow animate__fadeInLeft" data-wow-iteration="1" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-iteration-count: 1; animation-name: fadeInLeft;">
                            <a href="{{ route('events.index') }}" class="nav-link text-light">العودة للفعاليات</a>
                        </button>
                    </div>
            </div>
        </div>

        <x-buttons.contact-us/>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        window.addEventListener('load', function () {
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
        })
    </script>
@endpush
