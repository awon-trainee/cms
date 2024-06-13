<?php

namespace App\Http\Controllers;

use App\Models\FinancialReport;
use App\Services\ViewDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinancialReportController extends Controller
{
    public function index(ViewDataService $viewDataService)
    {
        $data = $viewDataService->getFinancialReports();
        return view('financial-reports', $data);
    }

    public function show($id)
    {
        $report = FinancialReport::findOrFail($id);

        return Storage::disk('digitalocean')->download($report->file , $report->title.'.pdf');
    }
}
