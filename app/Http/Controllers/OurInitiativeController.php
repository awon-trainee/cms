<?php

namespace App\Http\Controllers;

use App\Models\Initiative;
use App\Models\InitiativeRegistration;
use App\Services\ViewDataService;
use Illuminate\Http\Request;

class OurInitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewDataService $viewDataService)
    {
        $viewData = $viewDataService->getOurInitiativesData();
        return view('our-initiatives', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $initiative = Initiative::active()->id($request->input('initiative_id'))->firstOrFail();

        $initiativeRegistration = InitiativeRegistration::query()
            ->firstOrCreate([
                'initiative_id' => $initiative->id,
                'user_id' => auth()->user()->id,
            ]);

        if ($initiativeRegistration->wasRecentlyCreated){
            return redirect()->back()->with('success', 'تم التسجيل بنجاح');
        } else {
            return redirect()->back()->with('error', 'لقد تم التسجيل مسبقاً');
        }
    }
}
