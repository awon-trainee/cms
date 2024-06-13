<?php

namespace App\Http\Controllers;

use App\Enums\status\VolunteeringRequestStatus;
use App\Services\ViewDataService;
use Illuminate\Http\Request;

class VolunteeringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getVolunteeringData();

        return view('join-us.volunteer', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!auth()->check(), 404);

        if (auth()->user()->volunteeringRequests()->where('status', VolunteeringRequestStatus::PENDING)->exists()) {
            return redirect()->route('volunteering.index')->with('error', 'لديك طلب تطوع قيد المراجعة');
        }

        auth()->user()->volunteeringRequests()->create([]);

        return redirect()->route('volunteering.index')->with('success', 'تم ارسال طلب التطوع بنجاح');
    }
}
