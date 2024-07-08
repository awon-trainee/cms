<!-- resources/views/faq/index.blade.php -->
@extends('layouts.app')

@push('styles')
<link href="{{ asset('assets/css/faq.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="faq-container">
    <div class="faq-header">
        <h1>
            <img src="{{ asset('assets/icons/question-icon.png') }}" alt="questions Icon" class="faq-icon">
            الأسئلة الشائعة
        </h1>
        <p>المركز الإعلامي > الأسئلة الشائعة</p>
    </div>
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
