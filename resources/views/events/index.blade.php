@extends('layouts.app')

@section('content')

    <div class="all-secshen mt-6 ">
        <div class="viergein viergein-active-2 th mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">{{$pages['events']}}</h4>
                </div><!--title-->
            </div>
            <div class="all-edara calman one">
                @foreach($events as $event)
                    <div class="item-servicse Two one card-rounded m-2" id="news-calman-one">
                        <div class="img-servicse position-relative">
                            <img src="{{ $event->mainImage?->image_url }}" alt="" class="img-fluid rounded-top mb-0">
                            <div class="data position-absolute top-0 start-0 p-2 bg-primary text-white custom-shape">
                                <div class="date-text">
                                    {{ $event->created_at->locale('ar')->translatedFormat('d M Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="text-right p-3">
                            <h5 class="text-right">{{ $event->title }}</h5>
                            <h6 class="text-right">
                                <span>{{ mb_substr($event->content, 0, 100 - 3, "UTF-8").'...' }}</span>
                            </h6>
                        </div>
                        <div class="item-center w-100 text-center mt-auto mb-2">
                            <button class="btn btn-primary button-2 news">
                                <a href="{{ route('events.show', $event->id) }}" class="nav-link text-light">التفاصيل</a>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container row mx-auto">
                <div class="col-12">
                    {{ $events->links() }}
                </div>
            </div>
            <x-buttons.contact-us/>
        </div>
    </div>

@endsection

@push('styles')
<style>
.position-relative {
    position: relative;
}
.position-absolute {
    position: absolute;
}
.top-0 {
    top: 0;
}
.start-0 {
    left: 0;
}
.bg-primary {
    background-color: #8c5ab4 !important;
}
.text-white {
    color: white;
}
.p-2 {
    padding: 0.5rem;
}
.p-3 {
    padding: 1rem;
}
.custom-shape {
    border-top-left-radius: 15px;
    border-bottom-right-radius: 15px;
    padding: 5px 10px;
}
.date-text {
    padding-left: 5px;
}
.card-rounded {
    border-radius: 50px;
    overflow: hidden;
    border: 1px solid #ddd;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}
.card-rounded:hover {
    transform: translateY(-5px);
    background-color: #8c5ab4;
}
.text-right {
    text-align: right;
    padding-left: 0;
    margin: 0;
    text-align: right;
    width: 100%;
}
.d-flex {
    display: flex;
    flex-wrap: wrap;
}
.m-2 {
    margin: 0.5rem;
}
#news-calman-one {
    border-radius: 15px;
}
.all-secshen {
    font-size: 14px;
}
.title h4 {
    font-size: 16px;
}
.text-right h5 {
    font-size: 16px;
    color: #8c5ab4;
    font-weight: bold;
}
.text-right h6 {
    font-size: 12px;
    line-height: 2;
}
.btn {
    font-size: 12px;
}
.pagination {
    font-size: 12px;
}
</style>
@endpush
