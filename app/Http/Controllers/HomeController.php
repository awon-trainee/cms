<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailingListRequest;
use App\Models\BoardMember;
use App\Models\MailingListSubscriber;
use App\Services\ViewDataService;
use Illuminate\Contracts\View\View;
use App\Models\CharityTeamMember;

class HomeController extends Controller
{
    private ViewDataService $viewDataService;

    public function __construct(ViewDataService $viewDataService)
    {
        $this->viewDataService = $viewDataService;
    }

    public function index(): View
    {
        $viewData = $this->viewDataService->getIndexData();
        return view('home', $viewData);
    }

    public function contactUs(): View
    {
        $viewData = $this->viewDataService->getContactUsData();
        return view('contact-us', $viewData);
    }

    public function ourServices(): View
    {
        $viewData = $this->viewDataService->getOurServicesData();
        return view('our-services', $viewData);
    }

    public function executiveManager(): View
    {
        $viewData = $this->viewDataService->getExecutiveData();
        return view('about-us.executive-manager' , compact('viewData'));
    }

    public function ourInitiatives(): View
    {
        $viewData = $this->viewDataService->getOurInitiativesData();
        return view('our-initiatives', $viewData);
    }

    // {{------------------ About Us ------------------}}
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

    public function cvMember($id)
    {
        $boardMember = BoardMember::findOrFail($id);
        return view('pop-up', ['member' => $boardMember]);
    }

    public function workingTeam(): View
    {
        $viewData = $this->viewDataService->getWorkingTeamData();
        return view('about-us.charity-team', $viewData);
    }

    public function organizationalChart(): View
    {
        $viewData = $this->viewDataService->getOrganizationalChartData();
        return view('about-us.organizational-chart', $viewData);
    }

    // {{------------------ Join Us ------------------}}
    public function employment(): View
    {
        $viewData = $this->viewDataService->getEmploymentData();
        return view('join-us.employment', $viewData);
    }

    public function volunteering(): View
    {
        $viewData = $this->viewDataService->getVolunteeringData();
        return view('join-us.volunteer', $viewData);
    }

    public function membership(): View
    {
        $viewData = $this->viewDataService->getMembershipData();
        return view('join-us.membership', $viewData);
    }

    public function mailingList(MailingListRequest $request)
    {
        MailingListSubscriber::create($request->validated());

        return redirect()->back()->with('success', 'تم اشتراكك بنجاح');
    }
}
