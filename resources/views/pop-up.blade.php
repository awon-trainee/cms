@extends('layouts.app')

@section('content')
<div class="all-secshen">
    <div class="viergein viergein-active-2">
        <div class="all">
        <div class="card mb-3">
                    <div class="d-flex align-items-center manager-content">
                        <div class="avatar m-5">
                            <img class="card-img-top rounded-circle shadow" src="{{ asset($member->picture_url) }}" alt="manager-avatar" />
                        </div>
                        <div>
                            <p>{{$member->name}}</p>
                            <div class="d-flex align-items-center me-5 gap-2">
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

                    <div class="card-body">
                        <div class="manager-body shadow-sm w-100">
                            <div class="grid m-5">
                                <h6 class="fw-bold text-muted pt-5">المؤهلات</h6>
                                    <div class="d-flex gap-4 qualifications">
                                        @foreach($member->qualifications as $qualification)
                                            <div class="card my-3" style="max-width: 18rem;">
                                                <div class="mx-auto my-3 fs-6">{{$qualification->name}}</div>
                                                <div class="card-body">
                                                    <h5 class="text-center fs-6 fw-bold">{{$qualification->specialization}}</h5>
                                                    <div class="card-text grid">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset("assets/images/qualification-icon/uni.svg") }}" alt="uni" />
                                                            <p class="me-2 fs-6 mt-3">{{$qualification->university}}</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset("assets/images/qualification-icon/location.svg") }}" alt="location" />
                                                            <p class="me-2 fs-6 mt-3">{{$qualification->country}}</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset("assets/images/qualification-icon/calendar.svg") }}" alt="calendar" />
                                                            <p class="me-2 fs-6 mt-3">{{$qualification->year}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>

                            <div class="grid m-5 pb-5">
                                <h6 class="fw-bold text-muted pt-5">الخبرات</h6>
                                <div class="grid gap-4">
                                    @foreach($member->experiences as $experience)
                                        <div class="mt-3 experience">
                                            <div class="card border rounded-3">
                                                <div class="card-body">
                                                    <h5 class="card-title fs-7">{{$experience->position}}</h5>
                                                    <div class="card-text d-flex">
                                                        <div class="d-flex align-items-center">
                                                        <img src="{{ asset("assets/images/qualification-icon/calendar.svg") }}" alt="calendar" />
                                                        <p class="me-1 fs-6 mt-3">{{$experience->start_at}}-{{$experience->end_at}}</p>
                                                    </div>
                                                    <div class="d-flex align-items-center me-2">
                                                    <img src="{{ asset("assets/images/qualification-icon/location.svg") }}" alt="location" />
                                                        <p class="me-1 fs-6 mt-3">{{$experience->employr}}</p>
                                                    </div>
                                                </div>
                                                <ul class="list-group px-0">
                                                    @foreach(json_decode($experience->tasks) as $task)
                                                        <li>{{ $task->value }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
