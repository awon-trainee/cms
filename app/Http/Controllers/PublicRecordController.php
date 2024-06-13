<?php

namespace App\Http\Controllers;

use App\Models\PublicRecord;
use App\Services\ViewDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicRecordController extends Controller
{
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getPublicRecords();
        return view('public-records', $data);
    }

    public function show($id)
    {
        $record = PublicRecord::findOrFail($id);

        return Storage::disk('digitalocean')->download($record->file , $record->title.'.pdf');
    }
}
