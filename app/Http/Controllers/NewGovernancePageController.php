<?php

namespace App\Http\Controllers;

use App\Models\Governance;
use App\Models\Newgovernance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewGovernancePageController extends Controller
{
    public function index()
    {
        $newgovernances = Newgovernance::paginate(10);
        return view('newgovernance.index', compact('newgovernances'));
    }

    public function show($id)
    {
        $governance = Governance::findOrFail($id);
        $newgovernances = Newgovernance::where('at_page', $governance->id)->paginate(10);
        return view('New_Governance_Page', compact('governance', 'newgovernances'));
    }

    public function download($id)
    {
        $newgovernance = Newgovernance::findOrFail($id);
        $file = $newgovernance->file;
        return Storage::disk('digitalocean')->download($file, $newgovernance->title . '.pdf');
    }

    public function preview($id)
    {
        $newgovernance = Newgovernance::findOrFail($id);
        $filePath = $newgovernance->file;

        if (!Storage::disk('digitalocean')->exists($filePath)) {
            return abort(404, 'File not found');
        }

        $fileContent = Storage::disk('digitalocean')->get($filePath);
        return response($fileContent, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . basename($filePath) . '"');
    }
}
