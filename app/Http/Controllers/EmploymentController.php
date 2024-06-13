<?php

namespace App\Http\Controllers;

use App\Enums\status\EmploymentRequestStatus;
use App\Services\ViewDataService;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getEmploymentData();

        return view('join-us.employment', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!auth()->check(), 404);

        if (auth()->user()->employmentRequests()->where('status', EmploymentRequestStatus::PENDING)->exists()) {
            return redirect()->route('employment.index')->with('error', 'لديك طلب توظيف قيد المراجعة');
        }

        auth()->user()->employmentRequests()->create([]);

        return redirect()->route('employment.index')->with('success', 'تم ارسال طلب التوظيف بنجاح');
    }

}
