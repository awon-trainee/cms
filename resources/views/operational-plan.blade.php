@extends('layouts.app')

@section('content')
    <div class="all-secshen mt-6">
        <div class="viergein viergein-active-2 eo mt-1">
            <div class="all">
                <div class="title text-center">
                    <h4 class="text-dark w-100">
                        {{$pages['operational_plans']}}
                    </h4>

                </div><!--title-->
            </div>
            <div class="all-values one Two">
                @foreach($operationalPlans as $plan)
                    <div class="values-item item-One-o one">
                        <div class="Stinges">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                            </svg>
                        </div>
                        <p class="prgraph-one two m-0"> {{ $plan->title }} </p>
                        <div class="a"><a href="{{ route('operational-plans.show', $plan->id) }}" >
                                <div class="min-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                </div>
                            </a></div>
                    </div>
                @endforeach
            </div>
            <div class="m-2 mt-4">
                {{ $operationalPlans->links() }}
            </div>

            <x-buttons.contact-us/>
        </div>
    </div>
@endsection
