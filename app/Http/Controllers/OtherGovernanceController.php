<?php

namespace App\Http\Controllers;

use App\Http\Requests\OtherGovernanceRequest;
use App\Models\OtherGovernance;
use App\Services\ViewDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OtherGovernanceController extends Controller
{
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getOtherGovernance();
        return view('other-governance', $data);
    }

    public function show($id)
    {
        $record = OtherGovernance::findOrFail($id);

        return Storage::disk('digitalocean')->download($record->file , $record->title.'.pdf');
    }
}
