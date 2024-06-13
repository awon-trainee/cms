@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">{{$pages['services']}}</h4>
                </div><!--title-->
            </div>

            <div class="all-edara calman e">
                @foreach($services as $service)
                    <div class="item-servicse ss-or-sv">
                        <div class="img-servicse">
                            <span style="background: url({{ $service->image_url }})"></span>
                        </div>
                        <div class="title text-center">
                            <h3>
                                {{ $service->title }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <x-buttons.contact-us/>
    </div><!--all-secshen-->
@endsection
