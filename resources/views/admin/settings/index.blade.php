@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-2 text-light mt-3">{{ $title }}</h1>
    <div class="row">
        <div class="col-12 mb-2">
            <a href="{{ route($route.'.edit') }}" class="btn btn-primary"><i class="la la-pen me-1"></i> تعديل</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body m-2 row justify-content-center">
                    @foreach($settings::rules() as $name => $rules)
                        @php($splitRules = is_array($rules) ? $rules : explode('|', $rules))
                        @continue(in_array('boolean', $splitRules) || in_array('image', $splitRules) || str_contains($name, '.') || in_array('string', $splitRules))
                        @if(in_array((new \App\Rules\ColorValidation), $splitRules))
                            <div class="col-sm-12 col-md-4">
                                <div class="card  mb-3">
                                    <div class="card-header">{{ $settings->nameAr($name) }}</div>
                                    <div class="card-body" style="background: {{ $settings->$name }}">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-sm-12 col-md-12 mb-3">
                        <ul class="list-group list-group-flush list-inline row flex-row">
                            @foreach($settings::rules() as $name => $rules)
                                @php($splitRules = is_array($rules) ? $rules : explode('|', $rules))
                                @if(in_array('boolean', $splitRules))
                                    <li class="list-group-item col-6">
                                        @if($settings->$name)
                                            <i class="la la-check text-success me-3 fs-3"></i>
                                        @else
                                            <i class="la la-times text-danger me-3 fs-3"></i>
                                        @endif
                                        <span>{{ $settings->nameAr($name) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @foreach($settings::rules() as $name => $rules)
                        @continue(str_contains($name, '.'))
                        @php($splitRules = is_array($rules) ? $rules : explode('|', $rules))
                        @if(in_array('string', $splitRules) || in_array('url', $splitRules) || in_array('integer', $splitRules) || in_array('numeric', $splitRules) || in_array('email', $splitRules))
                            <div class="col-sm-12 col-md-6">
                                <div class="card  mb-3">
                                    <div class="card-header">{{ $settings->nameAr($name) }}</div>
                                    <div class="card-body">
                                        <p class="card-text">{{ empty($settings->$name) ? 'No Content.' : $settings->$name }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @foreach($settings::rules() as $name => $rules)
                        @php($splitRules = is_array($rules) ? $rules : explode('|', $rules))
                        @if(in_array('image', $splitRules))
                            <div class="col-sm-12 col-md-6">
                                <div class="card  mb-3">
                                    <div class="card-header">{{ $settings->nameAr($name) }}</div>
                                    <div class="card-body">
                                        @empty($settings->$name)
                                            <p class="card-text text-center">No Image.</p>
                                        @else
                                            <img src="{{ $settings::IMAGE_VIEW_PATH.$settings->$name }}" alt="{{ $name }}" class="img-fluid">
                                        @endempty
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
