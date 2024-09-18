@extends('layouts.app')

@section('content')
    <div class="all-secshen">
       <!-- <div class="viergein viergein-active-2">-->
            <div class="all">
                <div class="topnav"><!--اضافة ناف بار -->

                    <a class="navbar-brand" href="#" style="top: 40%; ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16" style="color: aqua;  padding: 10px;">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                          </svg>
                          المدير التنفيذي
                   </a>
                </div>





                <div class="card mb-3" style="
               width=70%;  margin: 200px 100; ">
                    <div class="manager-content">
                        <div class="avatar m-3">
                            <img class="card-img-top rounded-circle shadow" style=" width: 140px;
    height: 140px;
    position: relative;
            right: 20%;" src="{{ asset($ceo->image_url) }}" alt="manager-avatar"/>
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
                        <div class="manager-body shadow-sm d-flex justify-content-around"  >

                            <div class="grid m-5" >
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
<style>
    .topnav {

   background: rgb(63, 75, 187);
   position: fixed; /* Set the navbar to fixed position */
   top:70; /* Position the navbar at the top of the page */
   width: 100%;
   height: 70px;
   flex-wrap: wrap;
   padding: 0px 40px 0px 20px;



   }
   </style>
