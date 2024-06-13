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
                    <x-icons.volunteering/>
                </span>
            </div>
            <p style="
                    min-width: 50vw;
                    min-height: 30vh;
                "
            >
                {!! $settings->description !!}
            </p>
        </div>
        <div class="all-ope-a s">
            @auth
                <form action="{{ route('volunteering.store') }}" method="post">
                    @csrf
                    <a class="btn btn-primary text-light m-auto pra" role="button" onclick="this.parentElement.submit()">
                        تسجيل
                    </a>
                </form>
            @else
                <a class="btn btn-primary text-light m-auto pra disabled"  role="button">
                    تسجيل
                </a>
            @endauth
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
