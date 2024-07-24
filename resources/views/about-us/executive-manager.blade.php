@extends('layouts.app')

@section('content')
    <div class="all-secshen">
        <div class="viergein viergein-active-2">
            <div class="all">
                <div class="card mb-3">
                    <div class="manager-content">
                        <div class="avatar m-3">
                            <img class="card-img-top rounded-circle shadow" src="{{ asset($ceo->image_url) }}" alt="manager-avatar"/>
                        </div>
                        <div>
                            <p>{{$ceo->name}}</p>
                            <p class="fw-normal text-secondary">المدير التنفيذي</p>
                            <div class="d-flex align-items-center me-5 gap-2">
                                <a href="{{$ceo->telegram}}">
                                    <img src="{{ asset("assets/images/social-icons/telegram 2.svg") }}" alt="telegram"/>
                                </a>
                                <a href="{{$ceo->mail}}">
                                    <img src="{{ asset("assets/images/social-icons/gmail 2.svg") }}" alt="gmail"/>
                                </a>
                                <a href="{{$ceo->twitter}}">
                                    <img src="{{ asset("assets/images/social-icons/twitter 2.svg") }}" alt="twitter"/>
                                </a>
                                <a href="{{$ceo->phone}}">
                                    <img src="{{ asset("assets/images/social-icons/phone-call 1.svg") }}" alt="phone-call"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-5">
                        <div class="manager-body shadow-sm d-flex justify-content-around">
                            <div class="grid m-5">
                                <h6 class="fw-bold text-muted pt-5">المؤهلات</h6>
                                <div class="qualifications">
                                    @foreach($ceoQualification as $qualification)
                                        <div class="card my-3">
                                            <div class="d-flex align-items-center justify-content-center q-name-w">
                                                <hr />
                                                <div class="mx-auto my-3 fs-6 text-nowrap">{{ $qualification->name }}</div>
                                                <hr />
                                            </div>
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

                            <div class="grid m-5">
                                <h6 class="fw-bold text-muted pt-5">الخبرات</h6>
                                <div class="grid gap-4">
                                    @foreach($ceoExperience as $experience)
                                    <div class="mt-3 experience">
                                        <div class="card border rounded-3">
                                            <div class="card-body">
                                                <h5 class="card-title fs-7">{{$experience->position}}</h5>
                                                <div class="card-text d-flex">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset("assets/images/qualification-icon/calendar.svg") }}" alt="calendar" />
                                                        <p class="me-1 fs-6 mt-3 text-nowrap">from {{$experience->start_at}} to {{$experience->end_at}}</p>
                                                    </div>
                                                    <div class="d-flex align-items-center me-2">
                                                        <img src="{{ asset("assets/images/qualification-icon/location.svg") }}" alt="location" />
                                                        <p class="me-1 fs-6 mt-3">{{$experience->employer}}</p>
                                                    </div>
                                                </div>
                                                <ol class="list-group px-0 mx-4">
                                                    @foreach(json_decode($experience->tasks) as $task)
                                                        <li>{{ $task->value }}</li>
                                                    @endforeach
                                                </ol>
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
