@extends('layouts.app')

@section('content')

<div class="all-secshen mt-6">
    <div class="viergein viergein-active-2 eo mt-1">
        <div class="all">
            <div class="title text-center">
                <h4 class="text-dark w-100">
                    {{$pages['disclosure_transparency']}}
                </h4>
            </div>
            <!--title-->
        </div>
    </div>

    <style>
    /* -------------------------------------------------------- start cards style --------------------------------------------------*/
    .container {
        display: flex;
        scroll-snap-type: x mandatory;
        width: 90%;
        margin: 0 auto;
        padding: 0 15px;
    }

    .project-info {
        padding: 20px 40px;
        display: flex;
        flex-direction: column;
        gap: 30px;
        position: relative;
        top: -70px;
    }

    .project-title {
        font-weight: bold;
        font-size: 1.2em;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: rgba(var(--secondary-charity-color), 1);
        word-wrap: break-word;
        white-space: normal;
    }

    .row {
        display: flex;
        gap: 36px;
    }

    /*DELETE THIS TWO LINE*/
    .delete {
        background-color: #b2b2fd;
    }

    .card-img div {
        width: 90%;
    }

    /*IF USING IMAGES*/
    .card {
        background-color: #F6F6FA;
        color: black;
        width: 300px;
        max-height: 210px;
        border-radius: 8px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 10px 10px -20px,
            rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }

    .card-img {
        position: relative;
        top: -40px;
        left: 140px;
        height: 150px;
        display: flex;
        justify-content: center;
    }

    /* Change the .card-img div to .card-img img to use img*/
    .card-img a,
    .card-img div {
        height: 80px;
        width: 28%;
        /* Change this width here to change the width of the color/image */
        object-fit: cover;
        border-radius: 60px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }

    .card-imgs {
        transition: all 0.5s;
    }

    /* button style */
    .secondary-cta {
        font-size: 14px;
        color: #1677ff;
        text-decoration: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
    }

    .secondary-cta:hover {
        text-decoration: underline;
    }

    /* icon style */
    .icon-circle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        background-color: rgba(var(--primary-charity-color), 1);
        border-radius: 50%;
        margin-right: 8px;
    }

    .icon-circle svg {
        width: 20px;
        height: 20px;
        stroke: white;
    }

    /* folder icon style */
    .ficon-circle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 90px;
        height: 90px;
        background-color: #FCFCFC;
        border-radius: 50%;
        margin-right: 6px;
        stroke: #E5E4E4;
    }

    .ficon-circle svg {
        width: 50px;
        height: 50px;
        fill: #F4D03F;
        stroke: #E2C13A;
    }

    /* -------------------------------------------------------- end cards style --------------------------------------------------*/
    /*------------------------------------------------------- view file -------------------------------------------------- */

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #F1F1F5;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        border-radius: 8px;
        position: relative;
        max-height: 80%;
        overflow-y: auto;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        text-align: center;
        cursor: pointer;
    }

    .close-btn:hover {
        background-color: #444;
    }
    </style>

    <div class="container">
        <div class="row">
        @foreach($disclosuresAndTransparencies as $record)
            <article class="card">
                <div class="card-img">
                    <div class="ficon-circle">
                        <svg class="w-[46px] h-[46px] text-gray-800 dark:text-white " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 .087.586l2.977-7.937A1 1 0 0 1 6 10h12V9a2 2 0 0 0-2-2h-4.532l-1.9-2.28A2 2 0 0 0 8.032 4H4Zm2.693 8H6.5l-3 8H18l3-8H6.693Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="project-info">
                    <div class="project-title">{{ $record->title }}</div>

                    <div class="gap-buttons" style="display: flex; flex-direction: column; gap:20px;">
                        <a href="#" class="secondary-cta preview-btn" data-id="{{ $record->id }}"
                            data-title="{{ $record->title }}" style="display: flex; flex-direction: row; gap:15px;    ">
                            <div class="icon-circle">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <h6>معاينة</h6>
                        </a>

                        <a href="{{ route('disclosure-and-transparency.show', $record->id) }}" class="secondary-cta"
                            style="display: flex; flex-direction: row; gap:15px;">
                            <div class="icon-circle">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4" />
                                </svg>
                            </div>
                            <h6>تحميل</h6>
                        </a>
                    </div>
                </div>
            </article>

            @endforeach
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="previewModal" class="modal">
    <div class="modal-content">
        <!-- Project Title -->
        <h2 id="projectTitle" style="text-align: center;"></h2>
        <button class="close-btn" onclick="closeModal()">×</button>
        <iframe src="" id="pdfPreview" style="width: 100%; height: 500px;" frameborder="0"></iframe>
    </div>
</div>

<div class="m-2 mt-4">
{{ $disclosuresAndTransparencies->links() }}
</div>

<x-buttons.contact-us />

<script>
document.querySelectorAll('.preview-btn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const regulationId = this.getAttribute('data-id');
        const pdfUrl = `/regulations-and-policies/preview/${regulationId}`;

        // Set the project title
        const projectTitle = this.getAttribute('data-title');
        document.getElementById('projectTitle').innerText = projectTitle;

        // Log the URL to the console
        console.log("Loading PDF from URL: " + pdfUrl);

        // Set the PDF URL in the iframe
        document.getElementById('pdfPreview').src = pdfUrl;

        // Display the modal
        document.getElementById('previewModal').style.display = 'block';
    });
});

function closeModal() {
    document.getElementById('previewModal').style.display = 'none';
}
</script>

@endsection