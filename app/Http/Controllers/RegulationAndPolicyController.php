<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use App\Services\ViewDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegulationAndPolicyController extends Controller
{
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getRegulations();

        return view('regulation-and-policy', $data);
    }

    public function show($id)
    {
        $regulation = Regulation::findOrFail($id);

        return Storage::disk('digitalocean')->download($regulation->file , $regulation->title.'.pdf');
    }
}
