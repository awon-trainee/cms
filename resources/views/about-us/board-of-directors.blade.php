@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6 ">
       <!-- <div class="viergein viergein-active-1 mt-1">-->
                <div class="all">
                    <div class="topnav"><!--اضافة ناف بار -->

                        <a class="navbar-brand" href="#" style="top: 40%; ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16" style="color: aqua;  padding: 10px;">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                              </svg>
                                أعضاء مجلس الإدارة
                       </a>
                    </div>
              <!--  <div class="title text-center">
                    <h4 class="text-dark w-100">أعضاء مجلس الإدارة</h4>
                </div>-->
            </div>

            <div class="all-pepo row overflow-x-auto at m-auto position-relative "  style=" position: relative;
            right: 0%;
            top: 100px;">


                @foreach($stages as $stage => $members)

                    <div style="order: {{ $stage }}; -webkit-order: {{ $stage }}" class="row justify-content-center managers">

                        @foreach($members as $member)
                            <div class="col-lg-3 col-md-4 col-sm-12 mb-4 manager-content position-relative">
                                <div class="avatar position-absolute">
                                    <img src="{{ $member->picture_url }}" class="card-img-top rounded-circle shadow" alt="{{ $member->name }}" />
                                </div>

                                <div class="members-body border border-0 shadow float-left pe-4 "style=" color: rgba(53, 66, 184, 1);">
                                    <h6  style=" color: rgba(53, 66, 184, 1);">{{ $member->name }}</h6>
                                    <div class="d-grid gap-y-5">
                                        <small class="text-muted ">{{ $member->position->title }}</small>
                                        <small class="text-muted ">{{ $member->membership_type }}</small>
                                        <small class="text-muted ">{{ $member->term_council }}</small>
                                    </div>
                                    <div class="d-flex align-items-center mt-3 gap-2">
                                        <a href="{{$member->telegram}}" style="display: @if($member->telegram) block @else none @endif;">
                                            <img src="{{ asset("assets/images/social-icons/telegram 2.svg") }}" alt="telegram"/>
                                        </a>
                                        <a href="{{$member->mail}}" style="display: @if($member->mail) block @else none @endif;">
                                            <img src="{{ asset("assets/images/social-icons/gmail 2.svg") }}" alt="gmail"/>
                                        </a>
                                        <a href="{{$member->twitter}}" style="display: @if($member->twitter) block @else none @endif;">
                                            <img src="{{ asset("assets/images/social-icons/twitter 2.svg") }}" alt="twitter"/>
                                        </a>
                                        <a href="{{$member->phone}}" style="display: @if($member->phone) block @else none @endif;">
                                            <img src="{{ asset("assets/images/social-icons/phone-call 1.svg") }}" alt="phone-call"/>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="border-0 bg-transparent" data-bs-target="#memberId"
                                        onclick="showMemberModal({{ json_encode($member) }}, {{ json_encode($member->picture_url) }}, {{ json_encode($directorQualification) }}, {{ json_encode($directorExperience) }})">
                                            <img src="{{ asset("assets/images/cv.svg") }}" alt="cv" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal fade" style="margin-top:5rem;" id="memberId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog mx-auto">
                <div class="modal-content" style="width:744px; left:6rem;">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-3">
                            <div class="d-flex align-items-center manager-content">
                                <div class="avatar m-5">
                                    <img class="card-img-top rounded-circle shadow" id="member-img" src="" alt="" />
                                </div>
                                <div>
                                    <p id="member-name"></p>
                                    <div class="d-flex align-items-center me-5 gap-2">
                                        <a href="" id="member-telegram">
                                            <img src="{{ asset("assets/images/social-icons/telegram 2.svg") }}" alt="telegram"/>
                                        </a>
                                        <a href="" id="member-mail">
                                            <img src="{{ asset("assets/images/social-icons/gmail 2.svg") }}" alt="gmail"/>
                                        </a>
                                        <a href="" id="member-twitter">
                                            <img src="{{ asset("assets/images/social-icons/twitter 2.svg") }}" alt="twitter"/>
                                        </a>
                                        <a href="" id="member-phone">
                                            <img src="{{ asset("assets/images/social-icons/phone-call 1.svg") }}" alt="phone-call"/>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body mt-5">
                                <div class="manager-body shadow-sm">
                                    <div class="grid m-5">
                                        <h6 class="fw-bold text-muted pt-5">المؤهلات</h6>
                                        <div class="qualifications">
                                            <div class="card shadow my-3 rounded-4"></div>
                                        </div>
                                    </div>

                                    <div class="grid m-5">
                                        <h6 class="fw-bold text-muted pt-5">الخبرات</h6>
                                        <div class="grid gap-4">
                                            <div class="mt-3 experience pb-5 d-grid gap-2">
                                                <div class="card border shadow rounded-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-buttons.contact-us/>
    </div>
@endsection

@push('scripts')
    <script>
        function showMemberModal(member, memberPic, qualifications, experiences) {
            document.getElementById("member-name").textContent = member.name;
            document.getElementById("member-telegram").href = member.telegram;
            document.getElementById("member-mail").href = member.mail;
            document.getElementById("member-twitter").href = member.twitter;
            document.getElementById("member-phone").href = member.phone;
            document.getElementById("member-img").src = memberPic;

            let qualificationMemberId = qualifications.filter(qualification => qualification.members_id === member.id);
            let qualificationsContainer = document.querySelector(".qualifications");
            qualificationsContainer.innerHTML = "";
            qualificationMemberId.forEach(qualification => {
                let card = document.createElement("div");
                card.classList.add("card", "shadow", "my-3", "rounded-4");
                card.innerHTML = `
                <div class="d-flex align-items-center justify-content-center q-name-w">
                    <hr />
                    <div class="mx-auto my-3 fs-6 text-nowrap" id="qualification-name">${qualification.name}</div>
                    <hr />
                </div>
                <div class="card-body">
                    <h5 class="text-center fs-6 fw-bold" id="qualification-specialization">${qualification.specialization}</h5>
                    <div class="card-text grid">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset("assets/images/qualification-icon/uni.svg") }}" alt="uni" />
                            <p class="me-2 fs-6 mt-3" id="qualification-university">${qualification.university}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset("assets/images/qualification-icon/location.svg") }}" alt="location" />
                            <p class="me-2 fs-6 mt-3" id="qualification-country">${qualification.country}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset("assets/images/qualification-icon/calendar.svg") }}" alt="calendar" />
                            <p class="me-2 fs-6 mt-3" id="qualification-year">${qualification.year}</p>
                        </div>
                    </div>
                </div>`;
                qualificationsContainer.appendChild(card);
            });

            let experienceMemberId = experiences.filter(experience => experience.members_id === member.id);
            let experiencesContainer = document.querySelector(".experience");
            experiencesContainer.innerHTML = "";

            experienceMemberId.forEach(experience => {
                let task = JSON.parse(experience.tasks)
                let card = document.createElement("div");
                card.classList.add("card", "border", "rounded-4", "shadow");
                let startDateIndex  = experience.start_at.indexOf("-");
                let startDate = experience.start_at.substring(0, startDateIndex);
                let endDateIndex  = experience.end_at.indexOf("-");
                let endDate = experience.end_at.substring(0, endDateIndex);
                card.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title fs-7">${experience.position}</h5>
                    <div class="card-text d-flex">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset("assets/images/qualification-icon/calendar.svg") }}" alt="calendar" />
                            <p class="me-1 fs-6 mt-3 text-nowrap">${startDate} - ${endDate}</p>
                        </div>
                        <div class="d-flex align-items-center me-2">
                            <img src="{{ asset("assets/images/qualification-icon/location.svg") }}" alt="location" />
                            <p class="me-1 fs-6 mt-3">${experience.employer}</p>
                        </div>
                    </div>
                    <div>
                        <ol class="d-grid px-4">
                            ${task.map((t) => `<li style="list-style-type: circle;">${t.value}</li>`)}
                        </ol>
                    </div>
                </div>`;
                experiencesContainer.appendChild(card);
            });
        }
    </script>
@endpush

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
