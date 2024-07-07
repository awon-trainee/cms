@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">

            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">
                        أعضاء الجمعية العمومية
                    </h4>
                </div><!--title-->
            </div>
            <div class="charity-teams">
                @foreach($members as $member)
                    <div class="card position-relative">
                        <div class="avatar position-absolute">
                            <img src="{{ $member->picture_url }}" class="card-img-top rounded-circle" alt="{{ $member->name }}" />
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $member->name }}</p>
                            <small class="fw-normal text-secondary">{{ $member->position->title }}</small>
                            <div class="d-flex align-items-center mt-3 gap-2">
                                <a href="{{$member->telegram}}">
                                    <img src="{{ asset("assets/images/social-icons/telegram 2.svg") }}" alt="telegram"/>
                                </a>
                                <a href="{{$member->mail}}">
                                    <img src="{{ asset("assets/images/social-icons/gmail 2.svg") }}" alt="gmail"/>
                                </a>
                                <a href="{{$member->twitter}}">
                                    <img src="{{ asset("assets/images/social-icons/twitter 2.svg") }}" alt="twitter"/>
                                </a>
                                <a href="{{$member->phone}}">
                                    <img src="{{ asset("assets/images/social-icons/phone-call 1.svg") }}" alt="phone-call"/>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <x-buttons.contact-us/>
            </div>
        </div>
    </div>
@endsection
