<?php

namespace App\Http\Controllers;

use App\Models\Transparency;
use App\Services\ViewDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DisclosureAndTransparencyController extends Controller
{
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getDisclosuresAndTransparencies();
        return view('disclosures-and-transparencies', $data);
    }

    public function show($id)
    {
        $record = Transparency::findOrFail($id);

        return Storage::disk('digitalocean')->download($record->file , $record->title.'.pdf');
    }
}
