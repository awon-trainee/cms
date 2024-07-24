@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">{{$pages['initiatives']}}</h4>
                </div><!--title-->
            </div>
            <div class="list-of-op">
                @foreach($initiatives as $initiative)
                    <div class="card">
                        <div class="card-content">
                            <img src="{{ $initiative->image_url }}" alt="Card Image">
                            <h3>{{ $initiative->name }}</h3>
                            <p>{{ $initiative->description }}</p>
                            @if( $initiative->link )
                                <div class="d-flex link">
                                    <img src="{{ asset('assets/images/broken-link 1.svg') }}" alt="" class="" />
                                    <a href="{{ $initiative->link }}" class="fw-bold">
                                        <span>رابط:</span>
                                        انقر هنا
                                    </a>
                                </div>
                            @endif
                            <div class="all-ope-a btn-join">
                                    @auth
                                        <form action="{{ route('our-initiatives.store')}}" method="post">
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



                    <!-- <div class="item-servicse Two inv-hl d-flex align-items-end flex-column">
                        <div class="img-servicse mb-3 w-100">
                            <img src="{{ $initiative->image_url }}" alt="" height="150">
                        </div>
                        <div class="title text-end p-2 mb-2">
                            <h5>
                                {{ $initiative->name }}
                            </h5>
                            <p class="m-0 p-0">
                                {{ $initiative->description }}
                            </p>
                        </div>
                        <div class="mt-auto mx-auto ">
                            @auth
                                <form action="{{ route('our-initiatives.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="initiative_id" value="{{ $initiative->id }}">
                                    <button class="btn btn-primary button-2" type="submit">
                                        <a class="nav-link text-light">تسجيل </a>
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-primary button-2" disabled>
                                    <a class="nav-link text-light disabled">تسجيل </a>
                                </button>
                            @endauth
                        </div>
                    </div> -->
                @endforeach
                <x-buttons.contact-us/>
            </div>
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
    .card {
      width: 337px !important;
      height: 530px !important;
      background-color: rgba(var(--secondary-charity-color), 0.1) !important;
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
        color: rgba(var(--primary-charity-color), 1) !important;
        margin: 6rem;
    }
</style>