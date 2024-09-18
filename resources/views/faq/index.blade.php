<!-- resources/views/faq/index.blade.php -->
@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/faq.css') }}" rel="stylesheet">
@endpush

@section('content')
<!--<div class="all-secshen mt-6 container">-->
   <!-- <div class="viergein viergein-active-2 th mt-1">-->
        <div class="all">
            <div class="topnav"><!--اضافة ناف بار للعنوان -->
                <a class="navbar-brand" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                      </svg>
                الأسئلة الشائعة
               </a>
           <!--title-->
        </div>

                <div class="faq-container"style= " margin-top: 15%;  ">
                    <div class="faq-list" style=" width:60%;position: relative;
                right: 18%;  ">
                        @foreach ($faqs as $faq)
                            <div class="faq-item" style="background-color: rgba(53, 66, 184, 0.1)">

                                <button class="faq-question" type="button">
                                    <div> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="3 0 16 16" style="position: relative; color:rgba(53, 66, 184, 1)!important;
                                        right: 90%; top:15px; ">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                                              </svg></div>
                                    <span style="color:rgba(53, 66, 184, 1)!important;">{{ $faq->question }}  </span>
                                    <i class="arrow-down"> </i>

                                </button>
                                <div class="faq-answer">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!--title-->
        </div><!--all-->
    </div><!--viergein viergein-active-2 th mt-1-->
</div><!--all-secshen mt-6 container-->
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const questionButton = item.querySelector('.faq-question');

            questionButton.addEventListener('click', function() {
                const answer = item.querySelector('.faq-answer');
                const arrow = questionButton.querySelector('.arrow-down');

                answer.style.display = (answer.style.display === 'block') ? 'none' : 'block';
                arrow.classList.toggle('active');
            });
        });
    });
</script>
@endpush

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
