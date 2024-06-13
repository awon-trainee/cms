@extends('layouts.app')

@section('content')

    <div class="all-secshen mt-6 container">
        <div class="viergein viergein-active-2 th mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">
                        {{$pages['images']}}
                    </h4>
                </div><!--title-->
            </div>
                <div class="all-edara calman two text-center">
                @foreach($pictures as $picture)
                        <a class="item-servicse five" href="{{ $picture->picture_url }}" target="_blank">
                            <div class="img-servicse"><img src="{{ $picture->picture_url }}" alt=""></div>
                            <h3>{{ $picture->title }}</h3>
                        </a>
                @endforeach
                <div class="col-12">
                    {{ $pictures->links() }}
                </div>
                </div>
        </div>

        <x-buttons.contact-us/>
    </div>
@endsection
