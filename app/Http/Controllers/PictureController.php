<?php

namespace App\Http\Controllers;

use App\Services\ViewDataService;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewDataService $viewDataService)
    {
        $viewData = $viewDataService->getPictures();
        return view('pictures.index', $viewData);
    }
}
