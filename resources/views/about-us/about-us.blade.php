@extends('layouts.app')

@section('content')

    {{------------------ Who are we ------------------}}

    <div class="topnav"><!--اضافة ناف بار -->

        <a class="navbar-brand" href="#" style="top: 40%; ">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16" style="color: aqua;  padding: 10px;">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
              </svg>
          من نحن
          <!--<h6 class="text-dark w-100">كن نحن /h6>-->
       </a>
    </div>

   <!-- <div class="a-description align-items-center">
        <div class="icon" style="min-width: 300px; min-height: 200px">
            <x-icons.exclamation/>
            <h4 class="text-dark" style="white-space:pre-wrap;">{{ $pageSettings->question }}</h4>
        </div>
        <p class="d-sm-block m-auto px-3 text-md-center text-lg-end lh-lg" style="white-space:pre-wrap;">
            {{ $pageSettings->answer }}
        </p>
    </div>-->
    {{------------------ نبذه عن الجمعيه ر ------------------}}

    <div  style="display: block;  margin-top: 15%;   margin-right: 10%;">

            <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-pc-display-horizontal" viewBox="0 0 16 16" style="color: aqua;  padding: 10px;">
                <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5M12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0m2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0M1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25"/>
              </svg></div>

              <div style=" margin-top: -4%;  padding: 10px;  padding-right: 7%;">
            <h4 >نبذه عنّا</h4>
        </div>
<div>
        <p style="white-space:pre-wrap; margin-top: 0%;  padding: 10px;">{{ $generalSettings->brief }} </p>
</div>
    </div>

    {{------------------ Vision and Message ------------------}}
    <div class="viergein viergein-active pb-5 mb-3 ">

        <x-buttons.contact-us/>
        {{------------------ Vision and Message ------------------}}
        @if($pageSettings->show_vision_and_message)
        <div class="h-auto " style=" width:60%;display:block; align-items:center; background:rgba(127, 157, 178, 0.1);height:auto;position: relative;
	right: 40%;
	border: 2px solid rgb(221, 222, 222);  border-radius: 25px; box-shadow: 5px 5px 3px #888888;">
       <!-- <div class="all bot" id="sma">-->
        <div>
            <div>
                <img src="{{ asset("assets/icons/vision.svg") }}" alt="Vision Icon" style=" width:12%; height:12%;  position: relative;
                right: 1%;  top: 60px; border:none;" />

            </div>
            <div class="title" style="position: relative;
	right: 13%;  top: -100px;">
              <!--  <h4 class="text-dark">الرؤية</h4>-->
              <h4>رؤيتنا</h4>
            </div><!--title-->
            <div>
           <!-- <p class="lh-lg" style="white-space:pre-wrap;">-->
            <div class="h-auto "style="position: relative;right: 15%; top: -130px; display:block; width:80%;">
                {{ $generalSettings->vision }}
            </div></div>

        </div>
    </div>

       <!-- <div class="all all-Two bot">-->
        <div class="h-auto " style=" width:60%;display:block; align-items:center; background:rgba(127, 157, 178, 0.1);height:auto;position: relative;
        right: 0%;
        border: 2px solid rgb(221, 222, 222);  border-radius: 25px; box-shadow: 5px 5px 3px #888888; margin-top: 30px;">
           <!-- <div class="all bot" id="sma">-->
            <div>
                <img src="{{ asset("assets/icons/message.svg") }}" alt="Message Icon" style=" width:12%; height:12%;  position: relative;
                right: 70%;  top: 30px; border:none;" />

            </div>
            <div class="title" style="position: relative;
	right: 5%;  top: -70px;">
              <!--  <div class="Stings">
                    <x-icons.flag/>
                </div>-->
               <!-- <h4 class="text-dark">الرسالة</h4>-->
               <h4>رسالتنا</h4>
            </div><!--title-->
           <!-- <p class="text-dark lh-lg" style="white-space:pre-wrap;">-->
            <div class="h-auto "style="position: relative;right: 5%; top: -90px; display:block; width:90%;">
                {{ $generalSettings->message }}
           </div>
        </div>
<div style=" margin-top: 30px; width:100%;display:block; align-items:center; background:rgba(53, 66, 184, 0.06);height:auto;position: relative;">
    <div >
        <img src="{{ asset("assets/icons/goals.svg") }}" alt="Goals Icon" style=" width:4%; height:4%;  position: relative;
                right: 2%;  top: 20px; border:none;" />
                 </div>
    <div style="position: relative;
	right: 5%;  top: -60px;">
    <h4>أهدافنا</h4>
</div>
<div class="h-auto " style=" width:30%;display:block; align-items:center; background:rgba(255, 255, 255, 1);height:auto;position: relative;
right: 1%; top: -90px; margin: 2px 2px 2px 2px;
border: 2px solid rgb(221, 222, 222);  border-radius: 25px;">
<div class=" text-center rounded-3" style="width: 3%; height: auto;background:rgba(243, 244, 251, 1);color: rgba(53, 66, 184, 1); position: relative;right: 2%; top: 30px; border-radius: 50px; ">1</div>
<div class="h-auto "style="position: relative;right: 8%; top: -17px; display:block; width:85%;">
    {{ $generalSettings->goals }}
</div></div>
</div>
        @endif

        {{-- TODO: remove unsed empty space --}}
    </div>

    {{------------------ Values ------------------}}
    @if($pageSettings->show_values)
   <!-- <div class="viergein viergein-value mt-0 py-3 bg-charity-light">-->
    <div style="  width:100%;display:block; align-items:center;   padding: 30px; background:rgba(53, 66, 184, 1);height:auto;position: relative;">
        <div class="all Two">
            <div class="title ss-three d-flex align-items-center ">
               <!-- <div class="value-icon-2">
                    <x-icons.value/>
                </div>-->
               <!-- <h4 class="text-dark me-3">قيمنا</h4>-->
               <div style="position: relative;
	right: 5%;  top: -2px; color: rgb(248, 248, 250);">
               <h4 >قيمنا</h4></div>
            </div><!--title-->
            {{-- TODO: reuse numbers in the :after div, see classes: [item-One, item-Two, item-Three] --}}

         <div class="all-values p-3"  >
                @foreach($values as $value)
                    <div class="values-item" style=" width:100%;display:block; align-items:center; background:rgba(137, 144, 213, 1);height:auto;position: relative;
                    right: 1%; top: -10px;
                    border: 2px solid rgb(221, 222, 222);  border-radius: 2px;   margin: auto; ">
                        <!--<p class="m-0 lh-lg"-->
                            <div  style=" width:70%;display:block; align-items:center; height:auto;position: relative;
                            right: 1%; top: -1px;
                             margin: auto; " >{{ $value->title }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    {{------------------ Our Fields ------------------}}
    @if($pageSettings->show_fields)
   <!-- <div class="viergein viergein-area mt-0 py-3">
        <div class="all Two">-->
            <div id="fields" class="content">
                <div class="d-flex title align-items-center">
                    <img src="{{ asset("assets/icons/majalat.svg") }}" alt="Fields Icon" style=" width:3%; height:3%;  position: relative;
                right: 3%;  top: 20px; border:none;" /> />
                    <div style="position: relative;
	right: 3%;  top: 20px; ">
                    <h4>مجالاتنا</h4></div>
                </div>
                <svg width="1000" height="102" viewBox="0 0 1477 102" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative;
                right: 10%;  top: 1px; ">
                    <path d="M1 51L15.75 44.7209L30.5 38.5409L45.25 32.5574L60 26.8647L74.75 21.5526L89.5 16.705L104.25 12.3982L119 8.70013L133.75 5.6692L148.5 3.35315L163.25 1.78853L178 1H192.75L207.5 1.78853L222.25 3.35315L237 5.6692L251.75 8.70013L266.5 12.3982L281.25 16.705L296 21.5526L310.75 26.8647L325.5 32.5574L340.25 38.5409L355 44.7209L369.75 51L384.5 57.2791L399.25 63.4591L414 69.4426L428.75 75.1353L443.5 80.4474L458.25 85.295L473 89.6018L487.75 93.2999L502.5 96.3308L517.25 98.6468L532 100.211L546.75 101H561.5L576.25 100.211L591 98.6468L605.75 96.3308L620.5 93.2999L635.25 89.6018L650 85.295L664.75 80.4474L679.5 75.1353L694.25 69.4426L709 63.4591L723.75 57.2791L738.5 51L753.25 44.7209L768 38.5409L782.75 32.5574L797.5 26.8647L812.25 21.5526L827 16.705L841.75 12.3982L856.5 8.70013L871.25 5.6692L886 3.35315L900.75 1.78853L915.5 1L930.25 1L945 1.78853L959.75 3.35315L974.5 5.6692L989.25 8.70013L1004 12.3982L1018.75 16.705L1033.5 21.5526L1048.25 26.8647L1063 32.5574L1077.75 38.5409L1092.5 44.7209L1107.25 51L1122 57.2791L1136.75 63.4591L1151.5 69.4426L1166.25 75.1353L1181 80.4474L1195.75 85.295L1210.5 89.6018L1225.25 93.2999L1240 96.3308L1254.75 98.6468L1269.5 100.211L1284.25 101H1299L1313.75 100.211L1328.5 98.6468L1343.25 96.3308L1358 93.2999L1372.75 89.6018L1387.5 85.295L1402.25 80.4474L1417 75.1353L1431.75 69.4426L1446.5 63.4591L1461.25 57.2791L1476 51" stroke="rgba(53, 66, 184, 1)"/>
                </svg>
                <div class="fields-container" >
                    @foreach($fields as $field)
                    <div class="field">
                        <img src="{{ $field->icon_url }}" alt="Icon 1">
                        <p style="white-space:pre-wrap;">{{ $field->title }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
           <!-- <div class="title">

                <h4 class="text-dark">مجالاتنا</h4>
            </div> title-->

           <!-- <div class="all-area-Two">
                @foreach($fields as $field)
                    <div class="area-item d-flex">
                        <div class="title ss-four back-img-res d-flex align-items-center">
                            @if($field->icon)
                                <div class="Stings position-relative ms-2" style="background:url({{ $field->icon_url }}) center center no-repeat; background-size: contain;">
                                </div>
                            @else
                           <div class="Stings ms-2">
                                <x-icons.flag/>
                            </div >
                            @endif
                            <p class=" m-0 p-0 mw-100 lh-lg">{{ $field->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>-->
    </div>
    @endif
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

.field {
    background: #fff;
    border-radius: 100%;
    box-shadow: 0 4px 6px rgba(247, 245, 245, 0.1);
    padding: 20px;
    text-align: center;
    width: 100px;
    height: 100px;
    position: relative;
    right: 6%;
    top: -470px;
}

.field img {
    width: 50px;
    height: 50px;
    margin-bottom: 10px;
}

.field p {
    margin: 0;
    font-size: 14px;
    color: #333;
    width: 100px;
    position: relative;
    right: -30%;
}

.fields-container {
    display: flex;
    position: relative;
    right: 6%;
    top: auto;
   /* top: 20rem;*/
    margin-top: 1rem;
    gap: 4rem;

}


@media (max-width: 400px) {
    .fields-container {
        flex-direction: column;/*طريق العرض اعمده */
    }

}

@media screen and (min-width:855px) and (max-width:1430px) {
    .fields-container {
        top: 2rem;
    }
}

@media screen and (min-width:1431px) and (max-width:1440px) {
    .fields-container {
        top: 22.5rem;
    }
}

@media screen and (min-width:2000px) and (max-width:2560px) {
    .fields-container {
        top: 30rem;
    }
}

@media screen and (min-width:1000px) and (max-width:1024px) {
    .contents .content {
        width: fit-content !important;
    }
}



    #fields svg {
        width: 80%;
        stroke-width:3;

    }



</style>
