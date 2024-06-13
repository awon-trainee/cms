@extends(backpack_view('blank'))


@section('content')
    <div class="jumbotron">
        <h1 class="mb-4 text-muted">إحصائيات</h1>
        <div class="row">
            <div class="col-xl-2 col-md-4 col-sm-6 mt-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="text-success p-50 mb-3">
                            <i class="la la-users display-3"></i>
                        </div>
                        <h2 class="font-weight-bolder text-center">{{ $numberOfUsers }}</h2>
                        <p class="card-text text-center">المستخدمين</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mt-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="text-primary p-50 mb-3">
                            <i class="la la-handshake display-3"></i>
                        </div>
                        <h2 class="font-weight-bolder text-center">{{ $numberOfPartners }}</h2>
                        <p class="card-text text-center">الشركاء</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mt-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="text-warning p-50 mb-3">
                            <i class="la la-calendar display-3"></i>
                        </div>
                        <h2 class="font-weight-bolder text-center">{{ $numberOfInitiatives }}</h2>
                        <p class="card-text text-center">المبادرات</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mt-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="text-info p-50 mb-3">
                            <i class="la la-envelope display-3"></i>
                        </div>
                        <h2 class="font-weight-bolder text-center">{{ $numberOfSuggestionMessages }}</h2>
                        <p class="card-text text-center">الإقتراحات</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mt-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="text-danger p-50 mb-3">
                            <i class="la la-exclamation-triangle display-3"></i>
                        </div>
                        <h2 class="font-weight-bolder text-center">{{ $numberOfComplaintMessages }}</h2>
                        <p class="card-text text-center">الشكاوى</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mt-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="text-dark p-50 mb-3">
                            <i class="la la-question-circle display-3"></i>
                        </div>
                        <h2 class="font-weight-bolder text-center">{{ $numberOfInquiryMessages }}</h2>
                        <p class="card-text text-center">الإستفسارات</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
