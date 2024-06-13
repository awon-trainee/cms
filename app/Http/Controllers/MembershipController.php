<?php

namespace App\Http\Controllers;

use App\Enums\status\MembershipRequestStatus;
use App\Services\ViewDataService;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getMembershipData();

        return view('join-us.membership', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!auth()->check(), 404);

        if (auth()->user()->membershipRequests()->where('status', MembershipRequestStatus::PENDING)->exists()) {
            return redirect()->route('membership.index')->with('error', 'لديك طلب عضوية قيد المراجعة');
        }

        auth()->user()->membershipRequests()->create([]);

        return redirect()->route('membership.index')->with('success', 'تم ارسال طلب العضوية بنجاح');

    }
}
