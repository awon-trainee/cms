@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6 ">
        <div class="viergein viergein-active-1 mt-1">

            {{------------------ Title ------------------}}
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">أعضاء مجلس الإدارة</h4>
                </div>
            </div>

            <div class="all-pepo row overflow-x-auto at m-auto position-relative">
                @foreach($stages as $stage => $members)
                    <div style="order: {{ $stage }}; -webkit-order: {{ $stage }}" class="row justify-content-center managers">
                    @foreach($members as $member)
                            <div class="col-lg-3 col-md-4 col-sm-12 mb-4 manager-content position-relative">
                                <div class="avatar position-absolute">
                                    <img src="{{ $member->picture_url }}" class="card-img-top rounded-circle shadow" alt="{{ $member->name }}" />
                                </div>
                                <div class="members-body border border-0 shadow float-end pe-4">
                                    <h6>{{ $member->name }}</h6>
                                    <div class="overlay">
                                        <div class="text"><a href="{{ route('cv', ['id' => $member->id]) }}">انقر لعرض السيرة الذاتية</a></div>
                                    </div>
                                    <div class="d-grid">
                                        <small class="text-muted ">{{ $member->position->title }}</small>
                                        <small class="text-muted ">{{ $member->membership_type }}</small>
                                        <small class="text-muted ">{{ $member->term_council }}</small>
                                    </div>
                                    <div class="d-flex align-items-center mt-3 gap-2 me-4">
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
                    </div>
                @endforeach
                <x-buttons.contact-us/>
            </div>
        </div>
    </div>
@endsection
