@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="all-secshen mt-6">
    <div class="viergein viergein-active-2 mt-1">
        <div class="all">
            <div class="title text-center">
                <h4 class="text-dark w-100">ملفي الشخصي</h4>
            </div><!--title-->

            <div style="display: flex; justify-content: flex-end; align-items: center; gap: 20px;">
                <!-- Personal Information Section -->
                <div style="display: flex; flex-direction: row; align-items: center; gap: 20px; margin-right: 20px;">
                    <!-- Profile Picture -->
                    <div style="margin-left: auto;">
                        <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://cdn-icons-png.flaticon.com/128/6380/6380101.png' }}" alt="Profile Picture"
                            style="width: 150px; height: 150px; border-radius: 50%;">
                    </div>
                    <!-- Information -->
                    <div style="text-align: right; margin-left: 130px;">
                        <h5 style="font-weight: bold; color: #2e4ca4;">{{ $user->name }}</h5>
                        <h5>{{ $user->phone_number }}</h5>
                        <h5>{{ $user->email }}</h5>
                        <button id="update-button"
                            style="background-color: #8c5ab4 !important; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; width: 220px;">تحديث
                            البيانات الشخصية</button>
                    </div>
                </div>

                <!-- Design Section -->
                <div class="design-section text-center mt-4" style="display: flex; justify-content: left;">
                    <!-- Container to hold the cards inside a box with appropriate width and aligned to the left -->
                    <div class="card-container"
                        style="border: 1px solid #ccc; border-radius: 10px; padding: 10px 20px; background-color: #FFFFFF; display: inline-block; float: left; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); width: 730px; height: 199px; margin-left: -50px;">
                        <!-- Container to hold all the cards side by side -->
                        <div style="display: flex; justify-content: space-between; gap: 25px;">
                            <!-- Card 1 -->
                            <div class="card first-card"
                                style="text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background-color: #F3F4FB; width: 250px; height: 155px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.3s; padding-top: 20px; margin-top: 10px;">
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <!-- Image on the left -->
                                    <div style="margin-right: 10px; margin-bottom: 35px;">
                                        <img src="https://cdn-icons-png.flaticon.com/128/2988/2988036.png"
                                            alt="Idea Icon" style="width: 61px; height: 61px;">
                                    </div>
                                    <!-- Number on the right -->
                                    <b style="font-family: 'Tajwal', sans-serif; font-weight: bold;">
                                        <div
                                            style="font-size: 48px; color: #3542B8; margin-right: -15px; width: 78px; height: 104px;">
                                            {{ $initiativeCount }}
                                            </div>
                                    </b>
                                </div>
                                <!-- Text below the number and image -->
                                <div
                                    style="font-family: 'Tajwal', sans-serif; font-size: 1.3em; color: #5A5656; margin-top: -30px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; height: 34px;">
                                    عدد المبادرات المسجلة</div>
                            </div>

                            <!-- Card 2 -->
                            <div class="card"
                                style="text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background-color: #F3F4FB; width: 250px; height: 155px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.3s; padding-top: 20px; margin-top: 10px;">
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <!-- Image on the left -->
                                    <div style="margin-right: 10px; margin-bottom: 35px;">
                                        <img src="https://cdn-icons-png.flaticon.com/128/1161/1161724.png"
                                            alt="Idea Icon" style="width: 61px; height: 61px;">
                                    </div>
                                    <!-- Number on the right -->
                                    <b style="font-family: 'Tajwal', sans-serif; font-weight: bold;">
                                        <div
                                            style="font-size: 48px; color: #3542B8; margin-right: -10px; width: 78px; height: 104px;">
                                            {{ $messageCount }}
                                            </div>
                                    </b>
                                </div>
                                <!-- Text below the number and image -->
                                <div
                                    style="font-family: 'Tajwal', sans-serif; font-size: 1.3em; color: #5A5656; margin-top: -30px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; height: 34px;">
                                    عدد رسائل التواصل</div>
                            </div>

                            <!-- Card 3 -->
                            <div class="card last-card"
                                style="text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background-color: #F3F4FB; width: 250px; height: 155px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.3s; padding-top: 20px; margin-top: 10px;">
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <!-- Image on the left -->
                                    <div style="margin-right: 10px; margin-bottom: 25px;">
                                        <img src="https://cdn-icons-png.flaticon.com/128/1006/1006657.png"
                                            alt="Idea Icon" style="width: 61px; height: 61px;">
                                    </div>
                                    <!-- Number on the right -->
                                    <b style="font-family: 'Tajwal', sans-serif; font-weight: bold;">
                                        <div
                                            style="font-size: 48px; color: #3542B8; margin-right: -10px; width: 78px; height: 104px;">
                                           {{$volunteeringrequestCount}}</div>
                                    </b>
                                </div>
                                <!-- Text below the number and image -->
                                <div
                                    style="font-family: 'Tajwal', sans-serif; font-size: 1.3em; color: #5A5656; margin-top: -30px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; height: 34px;">
                                    عدد طلبات الانضمام</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--design-section-->
            <!-- New section with buttons and content -->
            <div class="button-content-section mt-5">
                <div class="buttons">
                    <button class="btn active" onclick="showContent('about', this)"> المبادرات المسجلة</button>
                    <button class="btn" onclick="showContent('goals', this)"> طلبات الانضمام</button>
                    <button class="btn" onclick="showContent('fields', this)"> رسائل التواصل</button>
                </div>
            </div>
            <!-- Centered Search Bar and Menus with Shadow and Tailwind CSS -->
            <div class="button-content-section mt-5">
                <!-- Search Bar with Dropdowns -->
                <div class="search-container">
                    <input type="text" placeholder="بحث ..." aria-label="Search">
                    <button type="button" onclick="performSearch()">Search</button>
                    <select>
                        <option selected>تاريخ التسجيل</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <select>
                        <option selected>حالة التسجيل</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
            </div><br>
            <div class="content" id="about" style="display: block;">
                <!-- Content for المبادرات المسجلة -->
                <div class="initiative-card"
                    style="border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin-bottom: 20px; background-color: #F3F4FB; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <h5 class="initiative-title" style="font-size: 1.5em; color: #2e4ca4; margin-bottom: 10px;">اسم
                        المبادرة</h5>
                    <div class="initiative-info"
                        style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="initiative-date" style="color: #888;">
                            <i class="fa fa-calendar" style="margin-right: 5px;"></i>تاريخ التسجيل: 02 يناير 2024
                        </div>
                        <div class="initiative-status" style="color: #888;">
                            <i class="fa fa-clipboard-check" style="margin-right: 5px;"></i>حالة التسجيل: تم إرسال الطلب
                        </div>
                        <div class="initiative-id" style="color: #888;">
                            <i class="fa fa-search" style="margin-right: 5px;"></i>رقم الطلب: #123454
                        </div>
                    </div>
                </div>
                <!-- يمكنك تكرار الكود أعلاه لكل مبادرة مسجلة -->
            </div>
            <div class="content" id="goals" style="display: none;">
                <!-- Content for طلبات الانضمام -->
            </div>
            <div class="content" id="fields" style="display: none;">

                <!-- Content for رسائل التواصل -->




            </div>
        </div>
        <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="container">
                    <div class="profile">
                        <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://cdn-icons-png.flaticon.com/128/6380/6380101.png' }}"
                            alt="Profile Picture">
                        <button class="edit-button" style="background-color: #8c5ab4 !important; color: white;">✎</button>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">رقم الجوال</label>
                            <input type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">تأكيد كلمة المرور</label>
                            <input type="password" id="confirm-password" name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <label for="profile_photo">صورة الملف الشخصي</label>
                            <input type="file" id="profile_photo" name="profile_photo">
                        </div>
                        <button type="submit" class="submit-button" style="background-color: #8c5ab4 !important; color: white;">حفظ التعديلات</button>
                    </form>
                </div>
            </div>
        </div><!--modal-->

    </div>
</div>
</div>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');

    .card:hover {
        transform: scale(1.05);
        /* تكبير البطاقة عند التأشير */
    }

    .card b {
        font-family: 'Tajwal', sans-serif;
        font-weight: bold;
    }

    .card div[style*="font-size: 48px"] {
        font-family: 'Tajwal', sans-serif;
    }

    .card div[style*="font-size: 1em"] {
        font-family: 'Tajwal', sans-serif;
    }

    .first-card {
        margin-left: 10px;
        /* تعديل الهامش على اليسار للبطاقة الأولى */
    }

    .last-card {
        margin-right: 10px;
        /* تعديل الهامش على اليمين للبطاقة الأخيرة */
    }

    .card-container {
        padding-left: 20px;
        /* زيادة الحافة اليسرى */
        padding-right: 20px;
        /* زيادة الحافة اليمنى */
    }

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        /* تعديل العرض ليكون 50% */
        max-width: 600px;
        /* أقصى عرض */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .profile {
        display: flex;
        align-items: center;
    }

    .profile img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 20px;
    }

    .edit-button {
        border: none;
        background: none;
        cursor: pointer;
        font-size: 18px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .submit-button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .initiative-card {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #F3F4FB;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .initiative-title {
        font-size: 1.5em;
        color: #2e4ca4;
        margin-bottom: 10px;
    }

    .initiative-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #888;
    }

    .button-content-section {
        background-color: #ffffff;
        width: 1004px;
        margin: 0 auto;
        /* Center the section horizontally */
    }

    .button-content-section .buttons {
        display: flex;
        justify-content: center;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Add shadow */
        border-radius: 10px;
        padding: 10px;
        /* Add padding to create space inside the border */
    }

    .button-content-section .btn {
        flex: 1;
        /* Ensure buttons take equal space */
        padding: 10px;
        font-size: 16px;
        background-color: #ffffff;
        border: 1px solid #000000;
        /* Directly set the border color */
        border-radius: 10px;
        transition: background-color 0.3s ease, color 0.3s ease;
        color: rgba(var(--secondary-charity-color), 1);
        margin: 0 10px;
        /* Add margin to create space between buttons */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Add shadow */
        cursor: pointer;
        display: flex;
        align-items: center;
        /* Align icon and text vertically */
        justify-content: center;
        /* Center icon and text */
        user-select: none;
    }

    .button-content-section .btn.active {
        background-color: rgba(var(--secondary-charity-color), 1);
        color: #ffffff;
    }

    .button-content-section .btn:hover {
        background-color: rgba(var(--secondary-charity-color), 0.2);
        color: #fff;
    }

    .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 10px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Add shadow */
        border-radius: 10px;
        width: 100%;
        /* Make it span the full width */
        margin-top: 20px;
    }

    .search-container input[type="text"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        flex: 1;
        /* Make it take up available space */
    }

    .search-container button {
        padding: 10px 20px;
        background-color: #8c5ab4;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .search-container button:hover {
        background-color: #732c9c;
    }

    .search-container select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }
</style>

<script>
    // JavaScript function to show/hide content based on button click
    function showContent(id, button) {
        // Hide all content sections
        var contents = document.querySelectorAll('.content');
        contents.forEach(function (content) {
            content.style.display = 'none';
        });

        // Deactivate all buttons
        var buttons = document.querySelectorAll('.btn');
        buttons.forEach(function (btn) {
            btn.classList.remove('active');
        });

        // Activate the clicked button
        button.classList.add('active');

        // Show the corresponding content section
        var selectedContent = document.getElementById(id);
        if (selectedContent) {
            selectedContent.style.display = 'block';
        }
    }
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("modal");
        var btn = document.getElementById("update-button");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function () {
            modal.style.display = "block";
        }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    const initiatives = [
        {
            title: "اسم المبادرة 1",
            date: "02 يناير 2024",
            status: "تم إرسال الطلب",
            id: "#123454"
        },
        {
            title: "اسم المبادرة 2",
            date: "15 فبراير 2024",
            status: "تم قبول الطلب",
            id: "#567890"
        }
    ];

    function displayInitiatives() {
        const container = document.getElementById('about');
        container.innerHTML = '';

        initiatives.forEach(initiative => {
            const card = document.createElement('div');
            card.classList.add('initiative-card');

            card.innerHTML = `
            <h5 class="initiative-title">${initiative.title}</h5>
            <div class="initiative-info">
                <div class="initiative-date"><span style="margin-right: 5px;">📅</span>تاريخ التسجيل: ${initiative.date}</div>
                <div class="initiative-status"><span style="margin-right: 5px;">📝</span>حالة التسجيل: ${initiative.status}</div>
                <div class="initiative-id"><span style="margin-right: 5px;">🔍</span>رقم الطلب: ${initiative.id}</div>
            </div>
        `;

            container.appendChild(card);
        });
    }

    document.addEventListener("DOMContentLoaded", displayInitiatives);

</script>
