@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">{{$pages['initiatives']}}</h4>
                </div><!--title-->
            </div>
            <div class="all-edara calman one eo or-serv">

                @foreach($initiatives as $initiative)
                    <div class="item-servicse Two inv-hl d-flex align-items-end flex-column">
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
                    </div>
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
