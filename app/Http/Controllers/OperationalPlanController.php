<?php

namespace App\Http\Controllers;

use App\Models\OperationalPlan;
use App\Services\ViewDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OperationalPlanController extends Controller
{
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getOperationalPlans();
        return view('operational-plan', $data);
    }

    public function show($id)
    {
        $operationalPlan = OperationalPlan::findOrfail($id);

        return Storage::disk('digitalocean')->download($operationalPlan->file , $operationalPlan->title.'.pdf');
    }
}
