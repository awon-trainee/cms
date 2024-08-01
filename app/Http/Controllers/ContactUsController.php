<?php

namespace App\Http\Controllers;

use App\Enums\type\ContactMessageType;
use App\Http\Requests\StoreContactUsRequest;
use App\Models\ContactMessage;
use App\Services\ViewDataService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewDataService $viewDataService)
    {
        $viewData = $viewDataService->getContactUsData();
        $contactTypes = ContactMessageType::cases();
        return view('contact-us', $viewData + compact('contactTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactUsRequest $request)
    {
        $validated = $request->validated();
    
        // Debugging dd($validated);
    
        ContactMessage::create($validated);
    
        return redirect()->route('contact-us.index')->with('success', 'تم إرسال رسالتك بنجاح');
    }
    
}
