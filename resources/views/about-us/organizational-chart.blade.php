@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
      <!--  <div class="viergein viergein-active-2 mt-1">-->
            <div class="all">
                <div class="topnav"><!--اضافة ناف بار -->

                    <a class="navbar-brand" href="#" style="top: 40%; ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16" style="color: aqua;  padding: 10px;">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                          </svg>
                          الهيكل التنظيمي
                   </a>
                </div>
               <!-- <div class="title text-center">
                    <h4 class="text-dark w-100">الهيكل التنظيمي</h4>
                </div><title-->
            </div>
            <div class="image row overflow-x-auto at m-auto " style=" position: relative;
            right: 0%;
            top: 100px;">
                <img src="{{$image_url}}" alt="">

                <x-buttons.contact-us/>
            </div>
        </div>
    </div>
@endsection
<style>
    .topnav {

   background: rgb(63, 75, 187);
   position: fixed; /* Set the navbar to fixed position */
   top:70; /* Position the navbar at the top of the page */
   width: 100%;
   height: 70px;
   flex-wrap: wrap;
   padding: 0px 40px 0px 20px;



   }
   </style>
