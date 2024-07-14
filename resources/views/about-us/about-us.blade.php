@extends('layouts.app')

@section('content')

    {{------------------ Who are we ------------------}}
    <div class="a-description align-items-center">
        <div class="icon" style="min-width: 300px; min-height: 200px">
            <x-icons.exclamation/>
            <h4 class="text-dark" style="white-space:pre-wrap;">{{ $pageSettings->question }}</h4>
        </div>
        <p class="d-sm-block m-auto px-3 text-md-center text-lg-end lh-lg" style="white-space:pre-wrap;">
            {{ $pageSettings->answer }}
        </p>
    </div>

    {{------------------ Vision and Message ------------------}}
    <div class="viergein viergein-active pb-5 mb-3 ">

        <x-buttons.contact-us/>
        {{------------------ Vision and Message ------------------}}
        @if($pageSettings->show_vision_and_message)
        <div class="all bot" id="sma">
            <div class="title">
                <div class="Stings">
                    <x-icons.vision/>
                </div>
                <h4 class="text-dark">الرؤية</h4>
            </div><!--title-->
            <p class="lh-lg" style="white-space:pre-wrap;">
                {{ $generalSettings->vision }}
            </p>

        </div>

        <div class="all all-Two bot">
            <div class="title">
                <div class="Stings">
                    <x-icons.flag/>
                </div>
                <h4 class="text-dark">الرسالة</h4>
            </div><!--title-->
            <p class="text-dark lh-lg" style="white-space:pre-wrap;">
                {{ $generalSettings->message }}
            </p>
        </div>

        <div class="all all-Two bot">
            <div class="title">
                <div class="Stings">
                    <x-icons.goals/>
                </div>
                <h4 class="text-dark">الهدف</h4>
            </div><!--title-->
            <p class="text-dark lh-lg" style="white-space:pre-wrap;">
                {{ $generalSettings->goals }}
            </p>
        </div>
        @endif

        {{-- TODO: remove unsed empty space --}}
    </div>

    {{------------------ Values ------------------}}
    @if($pageSettings->show_values)
    <div class="viergein viergein-value mt-0 py-3 bg-charity-light">
        <div class="all Two">
            <div class="title ss-three d-flex align-items-center ">
                <div class="value-icon-2">
                    <x-icons.value/>
                </div>
                <h4 class="text-dark me-3">قيمنا</h4>
            </div><!--title-->
            {{-- TODO: reuse numbers in the :after div, see classes: [item-One, item-Two, item-Three] --}}
            <div class="all-values p-3">
                @foreach($values as $value)
                    <div class="values-item">
                        <p class="m-0 lh-lg" style="white-space:pre-wrap;">{{ $value->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    {{------------------ Our Fields ------------------}}
    @if($pageSettings->show_fields)
    <div class="viergein viergein-area mt-0 py-3">
        <div class="all Two">
            <div class="title">

                <h4 class="text-dark">مجالاتنا</h4>
            </div><!--title-->
            <div class="all-area-Two">
                @foreach($fields as $field)
                    <div class="area-item d-flex">
                        <div class="title ss-four back-img-res d-flex align-items-center">
                            @if($field->icon)
                                <div class="Stings position-relative ms-2" style="background:url({{ $field->icon_url }}) center center no-repeat; background-size: contain;">
                                </div>
                            @else
                            <div class="Stings ms-2">
                                <x-icons.flag/>
                            </div>
                            @endif
                            <p class=" m-0 p-0 mw-100 lh-lg">{{ $field->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    </div>
@endsection
