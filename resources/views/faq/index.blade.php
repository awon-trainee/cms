<!-- resources/views/faq/index.blade.php -->
@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/faq.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="all-secshen mt-6 container">
    <div class="viergein viergein-active-2 th mt-1">
        <div class="all">
            <div class="title text-center">
                <h4 class="text-dark w-100">
                     الأسئلة الشائعة
                </h4>
                <div class="faq-container">
                    <div class="faq-list">
                        @foreach ($faqs as $faq)
                            <div class="faq-item">
                                <button class="faq-question" type="button">
                                    <span>{{ $faq->question }}</span>
                                    <i class="arrow-down"></i>
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