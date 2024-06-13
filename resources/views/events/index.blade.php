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
                        <div class="item-servicse Two one" id="news-calman-one">
                            <div class="img-servicse"><img src="{{ $event->mainImage?->image_url }}" alt=""></div>
                            <div class="data"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3-week" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                    <path d="M12 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-5 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2-3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-5 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg> {{ $event->created_at->locale('ar')->translatedFormat('d M Y') }}م </div>
                            <div class="title"><h3>{{ $event->title }}</h3>
                                <P><span>{{ mb_substr($event->content, 0, 100 - 3, "UTF-8").'...' }}</span> </P>
                            </div>
                            <div class="item-center w-100 text-center mt-auto mb-2">
                                <button class="btn btn-primary  button-2 news" >
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
@endsection
