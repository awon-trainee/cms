<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\ViewDataService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(viewDataService $viewDataService)
    {
        $viewData = $viewDataService->getEvents();
        return view('events.index', $viewData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, viewDataService $viewDataService)
    {
        $viewData = ['event' => $event];

        return view('events.show', $viewData);
    }
}
