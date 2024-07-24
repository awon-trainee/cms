<?php

namespace App\Http\Controllers;

use App\Models\Governance;
use App\Models\NewGovernance;
use Illuminate\Http\Request;

class GovernanceController extends Controller
{
    public function index()
    {
        $governances = Governance::all(); // Retrieve all governance items
        return view('your-view-name', compact('governances'));
    }

    public function show($id)
    {
        // Fetch the governance entry by ID
        $governance = Governance::findOrFail($id);

       // Fetch all related newgovernances where at_page matches governance id
       $newgovernances = NewGovernance::where('at_page', $governance->id)->paginate(10);
       
        // Pass both governance and newgovernances to the view
        return view('new_governance', compact('governance', 'newgovernances'));
    }
}