@extends('layouts.app')

@section('content')
<div class="all-secshen mt-6 container">
    <div class="viergein viergein-active-2 th mt-1">
        <div class="all">
            <div class="title text-center">
                <h4 class="text-dark w-100">
                    مكتبة الفيديو
                </h4>
                <div class="videos-container">
                    @foreach($videos as $video)
                        <div class="video-row">
                            <div class="video-thumbnail" onclick="openVideoModal('{{ $video->image_url }}')">
                                <video controls>
                                    <source src="{{ $video->image_url }}" />
                                </video>
                                <div class="video-info">
                                    <span class="video-date">{{ $video->date }}</span>
                                    <p class="video-title">{{ $video->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="video-modal" id="videoModal" onclick="closeVideoModal()">
                    <div class="video-container" onclick="event.stopPropagation()">
                        <iframe id="videoFrame" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div><!--title-->
        </div><!--all-->
    </div><!--viergein viergein-active-2 th mt-1-->
</div><!--all-secshen mt-6 container-->

<script>
    function openVideoModal(videoUrl) {
        var videoModal = document.getElementById('videoModal');
        var videoFrame = document.getElementById('videoFrame');
        videoFrame.src = videoUrl;
        videoModal.style.display = 'flex';
    }

    function closeVideoModal() {
        var videoModal = document.getElementById('videoModal');
        var videoFrame = document.getElementById('videoFrame');
        videoFrame.src = '';
        videoModal.style.display = 'none';
    }
</script>

<style>
    .videos-container {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 50px; /* مسافة بين الصفوف */
        padding-bottom: 60px; /* مسافة سفلية لمنع التداخل مع القسم البنفسجي */
    }

    @media (max-width: 768px) {
        .videos-container {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 320px) {
        .videos-container {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }

    .video-row {
        display: flex;
        justify-content: space-between; /* توزيع الفيديوهات بالتساوي مع مسافة بينهم */
        gap: 20px; /* مسافة بين الفيديوهات في الصف الواحد */
    }
    .video-thumbnail {
        position: relative;
        width: 300px;
        height: 300px; /* زيادة ارتفاع الفيديو */
        cursor: pointer;
        overflow: hidden; /* لتطبيق الزاوية المائلة بشكل صحيح */
        border-radius: 5px; /* زوايا مائلة */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* ظل خلف الفيديو */
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .video-thumbnail video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .video-thumbnail:hover {
        transform: translateY(-5px); /* رفع الفيديو قليلاً عند التمرير */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* زيادة الظل عند التمرير */
    }
    .video-thumbnail .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        background-size: contain;
        transition: transform 0.3s, filter 0.3s;
    }
    .video-thumbnail:hover .play-button {
        transform: translate(-50%, -50%) scale(1.1);
        filter: brightness(1.2);
    }
    .video-info {
        position: absolute;
        bottom: 0;
        right: 0; /* يبدأ من اليمين */
        width: 70%; /* عرض الشريط */
        background: rgba(255, 255, 255, 0.7); /* الشريط الأبيض الشفاف قليلاً */
        color: black; /* لون النص */
        padding: 5px; /* زيادة مساحة الشريط */
        box-sizing: border-box;
        text-align: right; /* نص من اليمين لليسار */
        border-top-left-radius: 5px; /* زوايا مائلة */
    }
    .video-info .video-date {
        color: #800080; /* تغيير لون التاريخ إلى بنفسجي غامق */
        margin: 0;
    }
    .video-info .video-title {
        margin: 0;
    }
    .video-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        justify-content: center;
        align-items: center;
        z-index: 1000;
        padding: 20px;
        box-sizing: border-box;
    }
    .video-container {
        position: relative;
        width: 80%;
        max-width: 800px;
        height: 80%;
        max-height: 450px;
        background: black;
    }
    .video-modal iframe {
        width: 100%;
        height: 100%;
    }
</style>
@endsection