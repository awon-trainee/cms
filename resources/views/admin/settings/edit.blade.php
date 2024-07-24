@extends(backpack_view('blank'))
@section('content')
    <div class="jumbotron">
        <h1 class="mb-4 text-light">{{ $title }}</h1>
        <div class="row">
            <form action="{{ route($route.".update") }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <div class="card-body m-2 row">
                            @foreach($settings::rules() as $name => $rules)
                            @php($splitRules = is_array($rules) ? $rules : explode('|', $rules))
                            @continue(in_array('boolean', $splitRules) || in_array('image', $splitRules) || str_contains($name, '.') || in_array('string', $splitRules))
                            @if(in_array((new \App\Rules\ColorValidation), $splitRules))
                            <div class="col-sm-12 col-md-4">
                                <div class="card  mb-3">
                                    <div class="card-header">{{ $settings->nameAr($name) }}</div>
                                    <div class="card-body p-0">
                                        <input class="form-control @error($name) is-invalid @enderror"
                                        type="color"
                                        id="{{ Str::kebab(Str::camel($name)) }}"
                                        value="{{ old($name, $settings->$name) }}"
                                        name="{{ $name }}">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <a href="{{ backpack_url('footer-links') }}">الروابط السريعة</a>
                            <div class="col-sm-12 col-md-12 mb-3">
                                <ul class="list-group list-group-flush list-inline row flex-row">
                                    @foreach($settings::rules() as $name => $rules)
                                        @php($splitRules = is_array($rules) ? $rules : explode('|', $rules))
                                        @if(in_array('boolean', $splitRules))
                                            <li class="list-group-item row col-6">
                                                <div class="col-12 d-flex align-items-center">
                                                    <input class="form-check-input me-3 @error($name) is-invalid @enderror"  type="checkbox"
                                                           value="1"
                                                           name="{{ $name }}"
                                                           @checked(old($name, $settings->$name)) id="{{ Str::kebab(Str::camel($name)) }}">
                                                    <label class="form-check-label stretched-link"
                                                           for="{{ Str::kebab(Str::camel($name)) }}">{{ $settings->nameAr($name) }}</label>
                                                </div>
                                                @error($name)
                                                <div class="col-12">
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                </div>
                                                @enderror
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @foreach($settings::rules() as $name => $rules)
                                @php($splitRules = is_array($rules) ? $rules : explode('|', $rules))
                                @if(in_array('image', $splitRules))
                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <div>
                                            <label class="" for="{{ Str::kebab(Str::camel($name)) }}">{{ $settings->nameAr($name) }}</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control @error($name) is-invalid @enderror"
                                                       id="{{ Str::kebab(Str::camel($name)) }}"
                                                       name="{{ $name }}" value="{{ old($name, $settings->$name) }}">
                                            </div>
                                            @error($name)
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @foreach($settings::rules() as $name => $rules)
                                @continue(str_contains($name, '.'))
                                @php($splitRules = is_array($rules) ? $rules : explode('|', $rules))
                                @if(in_array('string', $splitRules) || in_array('url', $splitRules) || in_array('integer', $splitRules) || in_array('numeric', $splitRules) || in_array('email', $splitRules))
                                    @php($maxRule = array_filter($splitRules, function ($rule) {
                                        return Str::startsWith($rule, 'max:');
                                    }))
                                    @php($max = explode(':', array_shift($maxRule))[1] ?? 255)
                                    @if($max <= 255 || in_array('url', $splitRules))
                                        <div class="col-sm-12 col-md-6 mb-3 order-1">
                                            <div class="card">
                                                <div class="card-header">{{ $settings->nameAr($name) }}</div>
                                                <input class="form-control card-body @error($name) is-invalid @enderror"
                                                       id="{{ Str::kebab(Str::camel($name)) }}"
                                                       value="{{ old($name, $settings->$name) }}"
                                                       name="{{ $name }}">
                                            </div>
                                            @error($name)
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="col-sm-12 col-md-6 mb-3 order-2">
                                            <div class="card">
                                                <div class="card-header">{{ $settings->nameAr($name) }}</div>
                                                <textarea class="form-control card-body @error($name) is-invalid @enderror"
                                                          id="{{ Str::kebab(Str::camel($name)) }}"
                                                          name="{{ $name }}" rows="3">{{ old($name, $settings->$name) }}</textarea>
                                            </div>
                                            @error($name)
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-success"><i class="la la-pen me-1"></i>
                        تحديث
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
