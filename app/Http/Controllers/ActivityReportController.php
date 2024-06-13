<?php

namespace App\Http\Controllers;

use App\Models\ActivityReport;
use App\Services\ViewDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityReportController extends Controller
{
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getActivityReports();
        return view('activity-reports', $data);
    }

    public function show($id)
    {
        $report = ActivityReport::findOrFail($id);

        return Storage::disk('digitalocean')->download($report->file , $report->title.'.pdf');
    }
}
