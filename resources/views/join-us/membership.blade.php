@extends('layouts.app')

@section('content')

    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 a mt-1 container">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">
                        {!! $settings->title !!}
                    </h4>
                </div><!--title-->
            </div>
            <div class="a-description two ">
                <div class="icon">
                <span>
                    <x-icons.membership/>
                </span>
                </div>
            </div>

        <div class="list-of-op">
            @foreach($membership_opportunity as $membership)
                <div class="card">
                    <img src="{{ $membership->image_link }}" class="card-img-top" alt="" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $membership->membership_title }}</h5>
                        <p class="card-text">{{ $membership->membership_desc }}</p>
                        <a href="{{ $membership->membership_link }}" class="btn btn-link fw-bold">
                            <span>رابط:</span>
                                انقر هنا
                        </a>
                        <div class="all-ope-a btn-join">
                            @auth
                                <form action="{{ route('employment.store') }}" method="post">
                                    @csrf
                                        <a class="btn btn-primary text-light" role="button" onclick="this.parentElement.submit()">
                                            تسجيل
                                        </a>
                                </form>
                            @else
                                <a class="btn btn-primary text-light m-auto pra disabled"  role="button">
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
