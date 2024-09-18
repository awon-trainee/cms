@extends('layouts.app')

@section('content')

    <div class="all-secshen mt-6">
      <!--  <div class="viergein viergein-active-2 a mt-1 container">-->
            <div class="all">

        <div class="all">
            <div class="topnav"><!--اضافة ناف بار -->

                <a class="navbar-brand" href="#" style="top: 40%; ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16" style="color: aqua;  padding: 10px;">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                      </svg>
                      {!! $settings->title !!}

               </a>
            </div>
                <!--<div class="title text-center">
                    <h4 class="text-dark w-100">
                        {!! $settings->title !!}
                    </h4>
                </div><!-title-
            </div>-->
          <!--  <div class="a-description two ">
                <div class="icon">
                <span>
                    <x-icons.membership/>
                </span>
                </div>
            </div>-->

            <div class="list-of-op" style=" margin-top: 15%;  ">
                @foreach($membership_opportunity as $membership)
                    <div class="card">
                        <div class="card-content">
                            <img src="{{ $membership->image_url }}" alt="Card Image">
                            <h3>{{ $membership->membership_title }}</h3>
                            <p>{{ $membership->membership_desc }}</p>
                            <div class="d-flex link">
                                <img src="{{ asset('assets/images/broken-link 1.svg') }}" alt="" class="" />
                                <a href="{{ $membership->membership_link }}" class="fw-bold">
                                    <span>رابط:</span>
                                    انقر هنا
                                </a>
                            </div>
                            <div class="all-ope-a btn-join">
                                    @auth
                                        <form action="{{ route('employment.store') }}" method="post">
                                            @csrf
                                                <a class="btn text-light" role="button" onclick="this.parentElement.submit()">
                                                    تسجيل
                                                </a>
                                        </form>
                                    @else
                                        <a class="btn text-light pra disabled"  role="button">
                                            تسجيل
                                        </a>
                                    @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <x-buttons.contact-us/>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            })
            @endif

            @if(session('error'))
            Swal.fire({
                icon: 'error',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000
            })
            @endif
        });
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
    .card {
      width: 337px !important;
      height: auto!important;
      background-color: rgba(127, 157, 178, 0.1) !important;
      border-radius: 10px !important;
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
        color:rgb(0, 1, 9)!important;
        text-decoration: none;
    }

    .link span {
        color :rgba(53, 66, 184, 1);
        font-size: 16px;
        font-weight: bold;
    }

    .btn-join form a {
        width: 123px;
        border-radius: 5px;
        background-color: white !important;
        color:rgba(53, 66, 184, 1)!important;
        margin-right: 100px;
    }
  </style>
