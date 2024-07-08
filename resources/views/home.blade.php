@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/libs/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            direction: rtl;
        }
        .title, .royal-title {
            text-align: center;
            margin-bottom: 40px; /* المسافة بين العناوين */
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .royal-title {
            font-size: 26px;
            color: #8c5ab4;
        }
        .container-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px; /* زيادة المسافة بين العنوان والحاوية */
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px; /* زيادة المسافة بين الحاويات */
            margin-left: -20px;
            margin-top: 10px; /* زيادة المسافة من الأعلى */
            height: auto;
        }
        .account-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: left;
            width: 60%;
            text-align: right;
            margin-right: 0.5em;
        }
        .account-details {
            margin-top: 0px;
            width: 80%;
            text-align: right;
        }
        .account-details p {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px; /* زيادة المسافة بين الفقرات */
            width: 100%; /* عرض الفقرة بالكامل */
            text-align: right; /* جعل النصوص تبدأ من الجهة اليمنى */
            direction: rtl; /* ضبط اتجاه النص إلى اليمين */
        }
        .account-details p strong {
            width: 30%; /* عرض العنوان */
            text-align: right; /* محاذاة العناوين لليمين */
            direction: rtl; /* ضبط اتجاه النص إلى اليمين */
        }
        .account-details p span {
            width: 70%; /* عرض المعلومات */
            text-align: right; /* محاذاة المعلومات لليمين */
            direction: rtl; /* ضبط اتجاه النص إلى اليمين */
        }
        .bank-logo-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 150px;
            height: 150px;
            background-color: #fff;
            border: 1px solid #ddd;
            position: absolute;
            right: -100px;
            top: 50%;
            transform: translateY(-50%);
        }
        .bank-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .select-container {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        #bankSelect {
            width: 100%; /* جعل الزر يمتد بطول الحاوية */
            padding: 10px;
            margin-bottom: 20px; /* تعديل المسافة بين الزر والعناصر المحيطة */
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #8c5ab4 !important;
            color: white !important;
            box-sizing: border-box;
            -webkit-appearance: none; /* إخفاء السهم الافتراضي */
            -moz-appearance: none;
            appearance: none;
            font-size: 15px; /* حجم النص داخل الزر */
            margin-top: 20px; /* زيادة المسافة بين الزر والعناصر المحيطة */
        }
        .select-container::after {
            content: '\f078'; /* رمز السهم للأسفل من FontAwesome */
            font-family: 'Font Awesome 5 Free'; /* استخدام FontAwesome */
            font-weight: 900; /* النسخة الصلبة من الأيقونة */
            position: absolute;
            left: 10px; /* موقع الأيقونة داخل الزر */
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px; /* تكبير الأيقونة */
            pointer-events: none; /* منع التفاعل مع الأيقونة */
            color: white; /* لون الأيقونة */
        }
        .bank-label {
            display: flex;
            align-items: center;
            width: 100%; /* جعل التسمية والزر يمتدان بطول الحاوية */
            white-space: nowrap;
            margin-bottom: 20px; /* تعديل المسافة بين العناوين والزر */
            gap: 40px; /* إضافة مسافة بين اسم المصرف والزر */
        }
        .bank-label span {
            margin-left: 10px;
            font-weight: bold; /* جعل اسم المصرف بولد */
        }
        span {
            margin-right: 0.0m;
        }
    </style>
@endpush

@section('content')
    <div class="container-wrapper">
        <h1 class="royal-title">حساباتنا الملكية</h1>
        <h1 class="title">حساباتنا البنكية</h1> <!-- تعليق: هنا عنوان الصفحة -->
        <div class="container">
            <div class="bank-logo-wrapper">
                <div class="bank-logo">
                    <img id="bankImage" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzt-ZS8yvZUd2JsjCmH_elXeOb5_fMQn8Osg&s" alt="bank logo">
                </div>
            </div>
            <div class="account-info">
                <div class="bank-label">
                    <span>اسم المصرف:</span>
                    <div class="select-container">
                        <select id="bankSelect" onchange="showAccountDetails()">
                            <option value="">اختر المصرف</option>
                            <option value="rajhi">الراجحي</option>
                            <option value="ahli">الأهلي</option>
                            <option value="anmha">الانماء</option>
                            <option value="jazira">الجزيرة</option>
                        </select>
                    </div>
                </div>
                <div class="account-details">
                    <p><strong>اسم الحساب:</strong> <span id="accountName"> </span></p>
                    <p><strong>رقم الحساب:</strong> <span id="accountNumber"> </span></p>
                    <p><strong>رقم الايبان:</strong> <span id="ibanNumber"> </span></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showAccountDetails() {
            var selectElement = document.getElementById("bankSelect");
            var selectedOptionValue = selectElement.value;

            var accountNameElement = document.getElementById("accountName");
            var accountNumberElement = document.getElementById("accountNumber");
            var ibanNumberElement = document.getElementById("ibanNumber");
            var bankImageElement = document.getElementById("bankImage");

            if (selectedOptionValue === "rajhi") {
                accountNameElement.textContent = "جهاد بخاري ";
                accountNumberElement.textContent =" 875270880000";
                ibanNumberElement.textContent = "SA23456789012345";
                bankImageElement.src = "https://www.asianleadershipawards.com/images/al_rajhi_bank_logo.jpg";
            } else if (selectedOptionValue === "ahli") {
                accountNameElement.textContent = "نزار البركاتي";
                accountNumberElement.textContent = "875270880000";
                ibanNumberElement.textContent = "SA23456789012345";
                bankImageElement.src = "https://www.almowaten.net/wp-content/uploads/2022/01/1842916-325987017.jpg";
            } else if (selectedOptionValue === "anmha") {
                accountNameElement.textContent = "أصيل العميري";
                accountNumberElement.textContent = "7655181817999";
                ibanNumberElement.textContent = "SA34567890123456";
                bankImageElement.src = "https://saudiscoop.com/wp-content/uploads/2021/04/alinma-768x511.jpg";
            } else if (selectedOptionValue === "jazira") {
                accountNameElement.textContent = "باسل جنيدي";
                accountNumberElement.textContent = "827373773737";
                ibanNumberElement.textContent = "SA45678901234567";
                bankImageElement.src = "https://www.logolynx.com/images/logolynx/84/84e036f81b4a179a7bea95d39a19f1a3.jpeg";
            } else {
                accountNameElement.textContent = "";
                accountNumberElement.textContent = "";
                ibanNumberElement.textContent = "";
                bankImageElement.src = "";
            }
        }
    </script>
@endsection
