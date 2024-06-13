<?php

namespace App\Http\Controllers;

use App\Services\ViewDataService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    private ViewDataService $viewDataService;

    public function __construct(ViewDataService $viewDataService)
    {
        $this->viewDataService = $viewDataService;
    }

    public function aboutUs(): View
    {
        $viewData = $this->viewDataService->getAboutUsData();
        return view('about-us.about-us', $viewData);
    }

    public function boardOfDirectors(): View
    {
        $viewData = $this->viewDataService->getBoardOfDirectorsData();
        return view('about-us.board-of-directors', $viewData);
    }

    public function generalAssemblyMembers(): View
    {
        $viewData = $this->viewDataService->getGeneralAssemblyMembersData();
        return view('about-us.general-assembly-members', $viewData);
    }

    public function workingTeam(): View
    {
        $viewData = $this->viewDataService->getWorkingTeamData();
        return view('about-us.general-assembly-members', $viewData);
    }

    public function organizationalChart(): View
    {
        $viewData = $this->viewDataService->getOrganizationalChartData();
        return view('about-us.organizational-chart', $viewData);
    }
}
