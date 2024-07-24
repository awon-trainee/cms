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

    public function preview($id)
    {
        $trans = Transparency::findOrFail($id);
        $filePath = $trans->file;
    
        // Log the file path for debugging
        \Log::info('File Path: ' . $filePath);
    
        // Check if the file exists in DigitalOcean Space
        if (!Storage::disk('digitalocean')->exists($filePath)) {
            \Log::error('File not found: ' . $filePath);
            return abort(404, 'File not found');
        }
    
        // Get the file URL
        $fileUrl = Storage::disk('digitalocean')->url($filePath);
    
        \Log::info('File URL: ' . $fileUrl);
    
        // Get the file content
        $fileContent = Storage::disk('digitalocean')->get($filePath);
    
        // Return the file content as a PDF response
        return response($fileContent, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . basename($filePath) . '"');
    }
}
