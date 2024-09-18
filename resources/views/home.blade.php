@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bank.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">

@endpush


@section('content')
    {{------------------ Hero ------------------}}
    @if($pageSettings->show_ads)
        <div class="owl-carousel owl-theme bg-charity-light">
            @foreach($ads as $ad)
                <section class="Main-address wow"
                         data-wow-duration="1s"
                         data-wow-iteration="1" data-wow-offset="1">
                    <div class="desgin">
                        <!-- objectfit: fill or cover -->
                        <!-- height and width from admin dashboard -->
                        <img class="position-relative" style="object-fit:@if($ad->filled_pic) fill @else cover @endif; height:35rem; width:100%" src="{{ asset($ad->image_url) }}" alt="ad-image">
                    </div><!--desgin-->
                    <div class="title" style=" display:@if(($ad->title && $ad->description) || ($ad->title || $ad->description)) block @else none @endif;">
                        <h4 style="width: 50%;   border-radius: 0px; background-color:rgba(53, 66, 184, 0.1);color:rgba(53, 66, 184, 1)">{{ $ad->title }}</h4>
                        <p style="width: 50%;   border-radius: 0px; background-color:rgba(53, 66, 184, 0.1);color:rgb(249, 249, 251)">{{ $ad->description }}</p>
                    </div>
                    <div class="stat"></div>

                </section>
            @endforeach
        </div>
    @endif
<!--هنا شريط  التنقل بين الصفحات الفرععيه النبذه والهدف وذا -->
    <div class="button-content-section mx-auto mt-5">
        <div class="buttons">
            <button class="btn active" onclick="showContent('about', this)"> النبذة</button>
            <button class="btn" onclick="showContent('goals', this)"> الأهداف</button>
            <button class="btn" onclick="showContent('vision-message', this)"> الرؤية والرسالة</button>
            <button class="btn" onclick="showContent('fields', this)" > المجالات</button>
        </div>
        <div class="contents mt-3">
            <div id="about" class="content" style="display: block;">
                <div class="d-flex align-items-end title">
                    <img src="{{ asset("assets/icons/about-us.svg") }}" alt="About Icon" />
                    <h4 style="color: rgba(53, 66, 184, 1);">نبذه عنّا</h4>
                </div>
                <p style="white-space:pre-wrap;">{{ $generalSettings->brief }}</p>
            </div>
            <div id="goals" class="content">
                <div class="d-flex align-items-end title">
                    <img src="{{ asset("assets/icons/goals.svg") }}" alt="Goals Icon" />
                    <h4 style="color: rgba(53, 66, 184, 1);">أهدافنا</h4>





                </div>
                <div class="goals-content">
                    <div class="h-auto " style=" width:100%;display:block; align-items:center; background:rgba(255, 255, 255, 1);height:auto;position: relative;
right: 0%; top: 20px; margin: 2px 2px 2px 2px;
border: 2px solid rgb(221, 222, 222);  border-radius: 25px;">
<div class=" text-center rounded-3" style="width: 3%; height: auto;background:rgba(243, 244, 251, 1);color: rgba(53, 66, 184, 1); position: relative;right: 2%; top: 30px; border-radius: 50px; ">1</div>
<div class="h-auto "style="position: relative;right: 8%; top: -17px; display:block; width:85%;">
    {{ $generalSettings->goals }}
</div></div>
                </div>
            </div>
            <div id="vision-message" class="content">

<div style=" width: 500px;  display: inline-block; position: relative;
right: 0%; top: 20px;">
                    <div class="vision">
                        <div class="d-flex title align-items-center">
                            <img src="{{ asset("assets/icons/vision.svg") }}" alt="Vision Icon" />
                            <h4  style="color: rgba(53, 66, 184, 1);">رؤيتنا</h4>
                        </div>
                        <p style="white-space:pre-wrap;  width:100%;display:block; text-align: center; border: 2px solid rgb(255, 255, 255); background-color: rgb(238, 242, 244);  box-shadow: 50px grey;
  border-radius: 15px;  ">{{ $generalSettings->vision }}</p>
                    </div></div>

<div style=" width: 500px;  display: inline-block; position: relative;
right: 5%; top: 20px;"> >
                    <div class="message">
                        <div class="d-flex title align-items-end">
                            <img src="{{ asset("assets/icons/message.svg") }}" alt="Message Icon" />
                            <h4  style="color: rgba(53, 66, 184, 1);">رسالتنا</h4>
                        </div>
                        <p style="white-space:pre-wrap;  width:100%;display:block; text-align: center; border: 2px solid rgb(255, 255, 255); background-color: rgb(238, 242, 244);  box-shadow: 50px grey;
  border-radius: 15px;  ">{{ $generalSettings->message }}</p>
                    </div>
                </div>
            </div>

            <div id="fields" class="content" style="margin-bottom: 8%">
                <div class="d-flex title align-items-center">
                    <img src="{{ asset("assets/icons/majalat.svg") }}" alt="Fields Icon" />
                    <h4 style="color: rgba(53, 66, 184, 1);">مجالاتنا</h4>
                </div>
                <svg width="1000" height="102" viewBox="0 0 1477 102" fill="none" xmlns="http://www.w3.org/2000/svg" style=" stroke-width:3;">
                    <path d="M1 51L15.75 44.7209L30.5 38.5409L45.25 32.5574L60 26.8647L74.75 21.5526L89.5 16.705L104.25 12.3982L119 8.70013L133.75 5.6692L148.5 3.35315L163.25 1.78853L178 1H192.75L207.5 1.78853L222.25 3.35315L237 5.6692L251.75 8.70013L266.5 12.3982L281.25 16.705L296 21.5526L310.75 26.8647L325.5 32.5574L340.25 38.5409L355 44.7209L369.75 51L384.5 57.2791L399.25 63.4591L414 69.4426L428.75 75.1353L443.5 80.4474L458.25 85.295L473 89.6018L487.75 93.2999L502.5 96.3308L517.25 98.6468L532 100.211L546.75 101H561.5L576.25 100.211L591 98.6468L605.75 96.3308L620.5 93.2999L635.25 89.6018L650 85.295L664.75 80.4474L679.5 75.1353L694.25 69.4426L709 63.4591L723.75 57.2791L738.5 51L753.25 44.7209L768 38.5409L782.75 32.5574L797.5 26.8647L812.25 21.5526L827 16.705L841.75 12.3982L856.5 8.70013L871.25 5.6692L886 3.35315L900.75 1.78853L915.5 1L930.25 1L945 1.78853L959.75 3.35315L974.5 5.6692L989.25 8.70013L1004 12.3982L1018.75 16.705L1033.5 21.5526L1048.25 26.8647L1063 32.5574L1077.75 38.5409L1092.5 44.7209L1107.25 51L1122 57.2791L1136.75 63.4591L1151.5 69.4426L1166.25 75.1353L1181 80.4474L1195.75 85.295L1210.5 89.6018L1225.25 93.2999L1240 96.3308L1254.75 98.6468L1269.5 100.211L1284.25 101H1299L1313.75 100.211L1328.5 98.6468L1343.25 96.3308L1358 93.2999L1372.75 89.6018L1387.5 85.295L1402.25 80.4474L1417 75.1353L1431.75 69.4426L1446.5 63.4591L1461.25 57.2791L1476 51" stroke="rgba(53, 66, 184, 1)"/>
                </svg>
                <div class="fields-container" >
                    @foreach($fields as $field)
                    <div class="field" style="position: relative; top: 580px;">
                        <img src="{{ $field->icon_url }}" alt="Icon 1">
                        <p style="white-space:pre-wrap; width:200px; position: relative;
    right: -150%;">{{ $field->title }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <br />
        </div>
    </div>



    <div>
        <div class="all der-3 wow animate__slideInUp" data-wow-duration=".5s" data-wow-iteration="1" id="sma1">
            <div class="title ps-5 mt-5">
                <h4 class=" text-center pb-2" style="color: rgba(53, 66, 184, 1)">أبرز مشاريعنا</h4>
            </div>
        </div>


        <div class="list-of-projects" >

            {{------------------ card of project ------------------}}
            @foreach($projects as $project)
            <div class="item-card Two one card-rounded m-2" id="project-calman-one">
                <div class="card">
                    <div class="card-content">
                        <img src="{{ $project->image_url }}" alt="Card Image">
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->content }}</p>
                    </div>
                </div></div>
            @endforeach
                {{------------------ card of project ------------------}}
        </div>


        <div style="background: rgba(53, 66, 184, 1);margin-bottom: 3%;" >
        @if($pageSettings->show_statistics)
            <div class="all der-3 wow animate__slideInUp" data-wow-duration=".5s" data-wow-iteration="1" id="sma1">
                <div class="title ps-5">
                    <h4 class=" text-center pb-2" style="color: rgb(255, 255, 255);  position: relative; top: 20px; ">إنجازاتنا في أرقام</h4>
                  <!--  <p>نفخر في العديد من الإنجازات ومن أهمها:</p>-->
                </div>
                <svg width="1000" height="102" viewBox="0 0 1477 102" fill="none" xmlns="http://www.w3.org/2000/svg" style=" width:100%;  color: rgb(253, 251, 251);  stroke-width:2; " >
                    <path d="M1 51L15.75 44.7209L30.5 38.5409L45.25 32.5574L60 26.8647L74.75 21.5526L89.5 16.705L104.25 12.3982L119 8.70013L133.75 5.6692L148.5 3.35315L163.25 1.78853L178 1H192.75L207.5 1.78853L222.25 3.35315L237 5.6692L251.75 8.70013L266.5 12.3982L281.25 16.705L296 21.5526L310.75 26.8647L325.5 32.5574L340.25 38.5409L355 44.7209L369.75 51L384.5 57.2791L399.25 63.4591L414 69.4426L428.75 75.1353L443.5 80.4474L458.25 85.295L473 89.6018L487.75 93.2999L502.5 96.3308L517.25 98.6468L532 100.211L546.75 101H561.5L576.25 100.211L591 98.6468L605.75 96.3308L620.5 93.2999L635.25 89.6018L650 85.295L664.75 80.4474L679.5 75.1353L694.25 69.4426L709 63.4591L723.75 57.2791L738.5 51L753.25 44.7209L768 38.5409L782.75 32.5574L797.5 26.8647L812.25 21.5526L827 16.705L841.75 12.3982L856.5 8.70013L871.25 5.6692L886 3.35315L900.75 1.78853L915.5 1L930.25 1L945 1.78853L959.75 3.35315L974.5 5.6692L989.25 8.70013L1004 12.3982L1018.75 16.705L1033.5 21.5526L1048.25 26.8647L1063 32.5574L1077.75 38.5409L1092.5 44.7209L1107.25 51L1122 57.2791L1136.75 63.4591L1151.5 69.4426L1166.25 75.1353L1181 80.4474L1195.75 85.295L1210.5 89.6018L1225.25 93.2999L1240 96.3308L1254.75 98.6468L1269.5 100.211L1284.25 101H1299L1313.75 100.211L1328.5 98.6468L1343.25 96.3308L1358 93.2999L1372.75 89.6018L1387.5 85.295L1402.25 80.4474L1417 75.1353L1431.75 69.4426L1446.5 63.4591L1461.25 57.2791L1476 51" stroke="#fffcfd"/>
                </svg>
            </div>
            <div class="all-enjazat as wow animate__slideInRight" data-wow-duration=".7s" data-wow-iteration="1">
                @foreach($statistics as $statistic)
                    <div class="mt-4 all all-to all-Two d-inline-block me-4" id="all-two">
                        <div class="title s position-relative">
                            <div class="Stings">
                                @if($statistic->icon)
                                    <img class="p-0 im-res" src="{{ $statistic->icon_url }}" alt="{{ $statistic->title }}" width="120">
                                @else
                                    <x-icons.flag/>
                                @endif
                            </div>
                            <h3>+{{ $statistic->value }}</h3>
                        </div>
                        <p class="p-0 m-0 mw-100">{{ $statistic->title }}</p>
                    </div>
                @endforeach
            </div></div>
        @endif

        @if($pageSettings->show_news)
            <div class="all-five sc wow animate__slideInLeft" data-wow-duration=".3s" data-wow-offset="600" id="sma1">
                <div class="title new-s-2 wow animate__slideInLeft" data-wow-duration=".2s"
                     data-wow-offset="-50">
                    <h4 class=" text-center pb-2" style="color: rgba(53, 66, 184, 1)">آخر أخبارنا</h4>
                   <!-- <p>آخر أخبار الجمعية:</p>-->
                </div>

                <div id="newsCarousel" class="carousel slide mt-4 mb-4" data-bs-ride="carousel">
                <div class="all-edara calman one">
                    @foreach($latest_news as $news)
                        <div class="item-servicse Two one card-rounded m-2" id="news-calman-one">
                            <div class="img-servicse position-relative">
                                <div class="img-fluid rounded-top mb-0" style="background-image: url({{ $news->mainImage->image_url }}); width: 100%; height: 200px; ">
      </div>

                            </div>

                            <div class="news-dates">
                                <div class="news-date" style="background-color:rgba(53, 66, 184, 1); position: relative;
right: 60%; top: -205px;  border-radius: 50px 20px; color: white;">

                                    <span>{{ $news->created_at->locale('ar')->translatedFormat('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="text-right p-3">
                                <h3 style="color: rgba(53, 66, 184, 1)">{{ $news->title }}</h3>
                                <p class="m-0 mw-100">{{ Str::limit($news->content, 100) }}</p>
                            </div>
                            <div class="item-center w-100 text-center mt-auto mb-2">
                            <button type="button"  style="  width: 200px; background: none; border: 2px ; border-radius: 10px; color: none;">
                                <a href="{{ route('news.show', $news->id) }}" class="nav-link text-light">تفاصيل</a>
                            </button>
                        </div>
                        </div>
                    @endforeach


                </div></div>
                <button  style=" position:relative;  left: -550px;item-center;border: 2px solid rgba(53, 66, 184, 1)  ;
  border-radius: 10px; background: rgba(53, 66, 184, 1);">   <a href="{{ route('news.index') }}" class="btn btn-custom">المزيد من الاخبار </a></button>

        @endif

        <div  style="display:@if(sizeof($banks) > 0) block @else none @endif;">
            <div class="all der-3 wow animate__slideInUp" data-wow-duration=".5s" data-wow-iteration="1" id="sma1">
                <div class="title ps-5 mt-5">
                    <h4 class=" text-center pb-2" style="color: rgba(53, 66, 184, 1)">حساباتنا البنكية</h4>
                </div>
                <div class="bank-container">
                    <div class="bank-logo-wrapper">
                        <div class="bank-logo">
                            @if($first_bank && $first_bank->image_url)
                                <img id="bankImage" src="{{ $first_bank->image_url }}" alt="bank logo">
                            @else
                                <img id="bankImage" src="" alt="bank logo">
                            @endif
                        </div>
                    </div>
                    <div class="account-info">
                        <div class="bank-label">
                            <span>اسم المصرف:</span>
                            <div class="select-container">
                                <select  style=" background: rgba(53, 66, 184, 1);" id="bankSelect" onchange="showAccountDetails()">
                                    @foreach($banks as $bank)
                                        <option  value="{{ $bank->id }}" id="bankName" data-image="{{ $bank->image_url }}">{{ $bank->bank_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="account-details">
                            <p>
                                <strong>اسم الحساب:</strong>
                                @if($first_bank && $first_bank->account_name)
                                    <span id="accountName">{{ $first_bank->account_name }}</span>
                                @else
                                    <span id="accountName"></span>
                                @endif
                            </p>
                            <p>
                                <strong>رقم الحساب:</strong>
                                @if($first_bank && $first_bank->account_number)
                                    <span id="accountNumber">{{ $first_bank->account_number }}</span>
                                @else
                                    <span id="accountNumber"></span>
                                @endif

                            </p>
                            <p>
                                <strong>رقم الايبان:</strong>
                                @if($first_bank && $first_bank->iban)
                                    <span id="ibanNumber">{{ $first_bank->iban }}</span>
                                @else
                                    <span id="ibanNumber"></span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div style="background: rgba(127, 157, 178, 0.1);" >
        @if($pageSettings->show_partners)
            <div class="shrka wow animate__backInDown" data-wow-duration=".9s" data-wow-iteration="1" data-wow-offset="-50">
                <div class="title sark-all">
                    <h4 class=" text-center pb-2" style="color: rgba(53, 66, 184, 1);  position: relative; top: 20px;">شركاؤنا</h4>
                </div>
                <div class="shrkat justify-content-center" >
                    @foreach($partners as $partner)
                        <div class="item d-flex justify-content-center" style="margin-bottom: 3%; margin:1%">
                            <a class="nav-link w-100">
                                <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}">
                            </a>
                            <p>{{ $partner->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
            </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        // add active class to first carousel item
        if(document.querySelector('.carousel-item')){
            document.querySelector('.carousel-item').classList.add('active');
        }

        // remove all-to from last element which has all-to
        if(document.querySelector('.all-to')) {
            Array.from(document.querySelectorAll('.all-to')).pop().classList.remove('all-to');
        }

        window.addEventListener('load', function () {

            if($('.owl-carousel').length) {
                $('.owl-carousel').owlCarousel({
                    loop: true,
                    nav: false,
                    rtl: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    dots: false,
                    items: 1,
                })
            }

            @if(session('success'))
            Swal.fire({
                icon: 'success',
                text: 'تم الإشتراك بنجاح',
                showConfirmButton: false,
                timer: 1500
            })
            @endif
            @error('email')
            Swal.fire({
                icon: 'error',
                text: '{{ $message }}',
                showConfirmButton: false,
                timer: 1500
            })
            @endif
        });
    </script>

    <script>
        function showAccountDetails() {
            let selectedBankId = document.getElementById("bankSelect").value;
            let selectedBank = @json($banks).find(bank => bank.id == selectedBankId);
            let selectedImage = document.getElementById("bankSelect").options[document.getElementById("bankSelect").selectedIndex].getAttribute('data-image');

            document.getElementById("accountName").textContent = selectedBank.account_name;
            document.getElementById("accountNumber").textContent = selectedBank.account_number;
            document.getElementById("ibanNumber").textContent = selectedBank.iban;

            document.getElementById("bankImage").src = selectedImage;
            document.getElementById("bankImage").alt = selectedBank.bank_name;
        }

        function showContent(contentId, element) {
        // Hide all content divs
        var contents = document.querySelectorAll('.content');
        contents.forEach(function(content) {
            content.style.display = 'none';
        });
        // Remove active class from all buttons
        var buttons = document.querySelectorAll('.btn');
        buttons.forEach(function(button) {
            button.classList.remove('active');
        });
        // Show the clicked content and add active class to the clicked button
        document.getElementById(contentId).style.display = 'block';
        element.classList.add('active');
    }
    </script>
@endpush

<style>
    .card {
      width: 260px !important;
      height: 360px !important;
      background-color: rgba(127, 157, 178, 0.1);
      border-radius: 20px !important;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .card-content h3 {
      font-size: 18px;
      font-weight: bold;
      margin-top: 15px;
      margin-right: 38px;
    }

    .card-content p {
      font-size: 14px;
      color: #666;
      margin-top: 15px;
      margin-right: 38px !important;
    }

    .card-content img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      margin-bottom: 16px;
    }

    /* Button styles */
    .card-content button {
      display: block;
      margin-right: auto;
      margin-left: auto;
      /* width: 100%; */
      padding: 12px 24px;
      background-color: #6c63ff;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }

    .link img {
        width: auto;
        height: 1.5rem;
    }

    .link {
        margin-right: 38px;
        align-items: center;
        gap: 0.5rem;
    }

    .link a {
        text-decoration: none;
    }

    .link span {
        color: rgba(var(--primary-charity-color), 1);
        font-size: 16px;
        font-weight: bold;
    }

    .btn-join form a {
        width: 123px;
        border-radius: 5px;
        background-color: white !important;
        color:   rgba(53, 66, 184, 1) !important;
        margin: 6rem;
    }

/*اخبارنا*/
    .position-relative {
    position: relative;
}
.position-absolute {
    position: absolute;
}
.top-0 {
    top: 0;
}
.start-0 {
    left: 0;
}
.bg-primary {
    background-color: rgba(53, 66, 184, 1) !important;
}
.text-white {
    color: white;
}
.p-2 {
    padding: 0.5rem;
}
.p-3 {
    padding: 1rem;
}
.custom-shape {
    border-top-left-radius: 15px;
    border-bottom-right-radius: 15px;
    padding: 5px 10px;
}
.date-text {
    padding-left: 5px;
}
.card-rounded {
    border-radius: 50px;
    overflow: hidden;
    border: 1px solid #ddd;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}
.card-rounded:hover {
    transform: translateY(-5px);
    background-color:rgba(53, 66, 184, 1) !important;
}
.text-right {
    text-align: right;
    padding-left: 0;
    margin: 0;
    text-align: right;
    width: 100%;
}
.d-flex {
    display: flex;
    flex-wrap: wrap;
}
.m-2 {
    margin: 0.5rem;
}
#news-calman-one {
    border-radius: 15px;
}
.all-secshen {
    font-size: 14px;
}
.text-right h5 {
    font-size: 16px;
    color: #8c5ab4;
    font-weight: bold;
}
.text-right h6 {
    font-size: 12px;
    line-height: 2;
}
.btn {
    font-size: 12px;
}
.pagination {
    font-size: 12px;
}

  </style>
