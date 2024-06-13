@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">الهيكل التنظيمي</h4>
                </div><!--title-->
            </div>
            <div class="image row overflow-x-auto at m-auto ">
                <img src="{{$image_url}}" alt="">

                <x-buttons.contact-us/>
            </div>
        </div>
    </div>
@endsection
