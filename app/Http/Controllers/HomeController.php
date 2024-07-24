<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailingListRequest;
use App\Models\BoardMember;
use App\Models\MailingListSubscriber;
use App\Models\Members;
use App\Services\ViewDataService;
use Illuminate\Contracts\View\View;
use App\Models\CharityTeamMember;
use App\Models\Qualification;
use App\Models\Experiance;

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
        $ceoQualification = Qualification::where('members_id', $viewData['ceo']->id)->get();
        $ceoExperience = Experiance::where('members_id', $viewData['ceo']->id)->get();

        if (!Members::where('name', $viewData['ceo']->name)->exists()) {
            Members::create([
                'name' => $viewData['ceo']->name
            ]);
        }

        return view('about-us.executive-manager' , $viewData, compact('ceoQualification', 'ceoExperience'));
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
        $directorQualification = [];
        $directorExperience = [];


        foreach ($viewData['stages'] as $key => $value) {
            foreach($value as $boardMemebr)
            if (!Members::where('name', $boardMemebr->name)->exists()) {
                Members::create([
                    'name' => $boardMemebr->name
                ]);
            }
            $directorQualification = Qualification::where('members_id', $boardMemebr->id)->get();
            $directorExperience = Experiance::where('members_id', $boardMemebr->id)->get();
        }


        return view('about-us.board-of-directors', $viewData, compact('directorQualification', 'directorExperience'));
    }

    public function generalAssemblyMembers(): View
    {
        $viewData = $this->viewDataService->getGeneralAssemblyMembersData();
        $assemblyQualification = [];
        $assemblyExperience = [];

        foreach ($viewData['members']->items() as $key => $value) {
            if (!Members::where('name', $value->name)->exists()) {
                Members::create([
                    'name' => $value->name
                ]);
            }
            $assemblyQualification = Qualification::where('members_id', $value->id)->get();
            $assemblyExperience = Experiance::where('members_id', $value->id)->get();
        }

        return view('about-us.general-assembly-members', $viewData, compact('assemblyQualification', 'assemblyExperience'));
    }

    public function workingTeam(): View
    {
        $viewData = $this->viewDataService->getWorkingTeamData();
        $teamQualification = [];
        $teamExperience = [];

        foreach ($viewData['members']->items() as $key => $value) {
            if (!Members::where('name', $value->name)->exists()) {
                Members::create([
                    'name' => $value->name
                ]);
            }
            $teamQualification = Qualification::where('members_id', $value->id)->get();
            // $memberId = 4;
            // $qualifications = Members::join('qualifications', 'members.id', '=', 'qualifications.members_id')->where('members.id', $memberId)
            // ->select('qualifications.*')->get();
            $teamExperience = Experiance::where('members_id', $value->id)->get();
        }

        return view('about-us.charity-team', $viewData, compact('teamQualification', 'teamExperience'));
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
