<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoLibrary;

class VideoLibraryController extends Controller
{
    public function index()
   {
        $videos = VideoLibrary::all();
        return view('videos.index', compact('videos'));
   }
}