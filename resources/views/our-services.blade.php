@extends('layouts.app')

@section('content')
    <style>
        .all-secshen {
            margin-top: 3rem;
        }

        .viergein-active-2 {
            margin-top: 1rem;
        }

        .title {
            text-align: center;
            margin-bottom: 2rem;
        }

        .all-edara {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .item-servicse {
            background: #e0e0e0; /* لون المربع البارز */
            border: 1px solid #ccc; /* حدود المربع */
            border-radius: 8px;
            width: 200px;
            padding: 1rem;
            text-align: right; /* العنوان في يمين المربع */
            transition: transform 0.3s;
            color: #000; /* لون الخط الأسود */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* ظل المربع */
            position: relative; /* لإستخدام position في العناصر الداخلية */
        }

        .item-servicse:hover {
            transform: translateY(-10px);
        }

        .service-title {
            font-size: 1.2rem;
            margin-top: 0.5rem;
            font-weight: bold;
            position: absolute; /* لإستخدام position في العناصر الداخلية */
            right: 1rem; /* تثبيت العنوان في يمين المربع */
            top: 1rem; /* مسافة من الأعلى */
        }

        .service-description {
            font-size: 1rem;
            text-align: center; /* التفاصيل في وسط المربع */
            position: absolute; /* لإستخدام position في العناصر الداخلية */
            top: 50%; /* تثبيت التفاصيل في وسط المربع */
            left: 50%; /* تثبيت التفاصيل في وسط المربع */
            transform: translate(-50%, -50%); /* لتحريك التفاصيل إلى وسط المربع تماماً */
        }

        .text-center {
            text-align: center;
        }
    </style>

    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">{{$pages['services']}}</h4>
                </div><!--title-->
            </div>

            <div class="all-edara calman e">
                <div class="item-servicse ss-or-sv">
                    <h3 class="service-title">الخدمة</h3>
                    <p class="service-description">تقدم هذه الخدمة.</p>
                </div>
                <div class="item-servicse ss-or-sv">
                    <h3 class="service-title">الخدمة</h3>
                    <p class="service-description">تقدم هذه الخدمة.</p>
                </div>
                <div class="item-servicse ss-or-sv">
                    <h3 class="service-title">الخدمة</h3>
                    <p class="service-description">تقدم هذه الخدمة.</p>
                </div>
                <div class="item-servicse ss-or-sv">
                    <h3 class="service-title">الخدمة</h3>
                    <p class="service-description">تقدم هذه الخدمة.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <x-buttons.contact-us/>
        </div>
    </div><!--all-secshen-->
@endsection
