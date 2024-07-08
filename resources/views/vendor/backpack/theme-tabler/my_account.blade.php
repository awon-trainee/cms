@extends('layouts.app')
@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">ملفي الشخصي</h4>
                </div><!--title-->

                <div style="display: flex; justify-content: flex-end; align-items: center; gap: 20px;">
                    <!-- Personal Information Section -->
                    <div style="display: flex; flex-direction: row; align-items: center; gap: 20px;">
                        <!-- Profile Picture -->
                        <div>
                            <img src="https://cdn-icons-png.flaticon.com/128/6380/6380101.png" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;">
                        </div>
                        <!-- Information -->
                        <div style="text-align: right;">
                            <h5 style="font-weight: bold; color: #2e4ca4;">الاسم الثلاثي</h5>
                            <h5 style="font-weight: "> 966543210987 </h5>
                            <h5 style="font-weight: ">email@email.com </h5>
                           
                            <button id="update-button" style="background-color: #8c5ab4; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">تحديث البيانات الشخصية</button>
                        </div>
                    </div>

                    <!-- Design Section -->
                    <div class="design-section text-center mt-4" style="border: 1px solid #ccc; border-radius: 10px; padding: 20px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); width: 800px;">
                        <!-- Container to hold all the cards side by side -->
                        <div style="display: flex; justify-content: left; gap: 25px;">
                            <!-- Card 1 -->
                            <div class="card" style="text-align: center; border: 1px solid #ccc; padding: 20px; border-radius: 10px; background-color: #E6E6FA; height: 210px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.3s;">
                                <!-- ظل خلف البطاقة وتفاعل عند التأشير -->
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <!-- Image on the left -->
                                    <div style="margin-right: 20px;"> <!-- زيادة المسافة على الجانب الأيمن من الأيقونة -->
                                        <img src="https://cdn-icons-png.flaticon.com/128/2988/2988036.png" alt="Idea Icon" style="width: 90px; height: auto;">
                                    </div>
                                    <!-- Number on the right -->
                                    <b>
                                    <div style="font-size: 5em; color: #0000FF; margin-left: 20px;">3</div> <!-- زيادة المسافة على الجانب الأيسر من الرقم -->
                                    </b>
                                </div>
                                <!-- Text below the number and image -->
                                <div style="font-size: 1.7em; color: #333; margin-top: -15px;">عدد المبادرات المسجلة</div>
                            </div>

                            <!-- Card 2 -->
                            <div class="card" style="text-align: center; border: 1px solid #ccc; padding: 20px; border-radius: 10px; background-color: #E6E6FA; height: 210px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.3s;">
                                <!-- ظل خلف البطاقة وتفاعل عند التأشير -->
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <!-- Image on the left -->
                                    <div style="margin-right: 20px;"> <!-- زيادة المسافة على الجانب الأيمن من الأيقونة -->
                                        <img src="https://cdn-icons-png.flaticon.com/128/1161/1161724.png" alt="Idea Icon" style="width: 90px; height: auto;">
                                    </div>
                                    <!-- Number on the right -->
                                    <b>
                                    <div style="font-size: 5em; color: #0000FF; margin-left: 20px;">5</div> <!-- زيادة المسافة على الجانب الأيسر من الرقم -->
                                    </b>
                                </div>
                                <!-- Text below the number and image -->
                                <div style="font-size: 1.7em; color: #333; margin-top: -15px;">عدد رسائل التواصل</div>
                            </div>

                            <!-- Card 3 -->
                            <div class="card" style="text-align: center; border: 1px solid #ccc; padding: 20px; border-radius: 10px; background-color: #E6E6FA; height: 210px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.3s;">
                                <!-- ظل خلف البطاقة وتفاعل عند التأشير -->
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <!-- Image on the left -->
                                    <div style="margin-right: 20px;"> <!-- زيادة المسافة على الجانب الأيمن من الأيقونة -->
                                        <img src="https://cdn-icons-png.flaticon.com/128/1006/1006657.png" alt="Idea Icon" style="width: 90px; height: auto;">
                                    </div>
                                    <!-- Number on the right -->
                                    <b>
                                    <div style="font-size: 5em; color: #0000FF; margin-left: 20px;">3</div> <!-- زيادة المسافة على الجانب الأيسر من الرقم -->
                                    </b>
                                </div>
                                <!-- Text below the number and image -->
                                <div style="font-size: 1.7em; color: #333; margin-top: -15px;">عدد طلبات الانضمام</div>
                            </div>
                        </div>
                    </div>
                </div><!--design-section-->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="container">
                <div class="profile">
                    <img src="profile-placeholder.png" alt="Profile Picture">
                    <button class="edit-button">✎</button>
                </div>
                <form>
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" id="name" placeholder="الاسم الثلاثي">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" id="email" placeholder="email@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الجوال</label>
                        <input type="text" id="phone" placeholder="543210987" required>
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">تأكيد كلمة المرور</label>
                        <input type="password" id="confirm-password" required>
                    </div>
                    <button type="submit">تحديث البيانات</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<style>
    .card:hover {
        transform: scale(1.05); /* تكبير البطاقة عند التأشير */
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
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

    /* Existing form styles */
    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%;
    }

    .profile {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 2px solid #ddd;
    }

    .edit-button {
        background: none;
        border: none;
        cursor: pointer;
        position: relative;
        top: -30px;
        left: 30px;
        font-size: 20px;
        color: #666;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .form-group input {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

@section('scripts')
    <script>
        // Get the modal
        var modal = document.getElementById("modal");

        // Get the button that opens the modal
        var btn = document.getElementById("update-button");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
