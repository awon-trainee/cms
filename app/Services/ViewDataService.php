<?php

namespace App\Services;

use App\Models\ActivityReport;
use App\Models\BoardMember;
use App\Models\CharityTeamMember;
use App\Models\Event;
use App\Models\Field;
use App\Models\FinancialReport;
use App\Models\GeneralAssemblyMember;
use App\Models\HomeAd;
use App\Models\HomeStatistic;
use App\Models\Initiative;
use App\Models\News;
use App\Models\OperationalPlan;
use App\Models\OtherGovernance;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Picture;
use App\Models\PublicRecord;
use App\Models\Regulation;
use App\Models\Service;
use App\Models\Projects;
use App\Models\EmploymentOpportunity;
use App\Models\VolunteerOpportunity;
use App\Models\MembershipOpportunity;
use App\Models\Transparency;
use App\Models\Value;
use App\Models\Banks;
use App\Settings\AboutUsPageSettings;
use App\Settings\ContactUsSetting;
use App\Settings\EmploymentSettings;
use App\Settings\GeneralSettings;
use App\Settings\HomePageSettings;
use App\Settings\MembershipSettings;
use App\Settings\OrganizationalStructureSettings;
use App\Settings\VolunteeringSettings;

class ViewDataService
{

    public function getIndexData(): array
    {
        $data['pageSettings'] = (new HomePageSettings);
        $data['generalSettings'] = (new AboutUsPageSettings);

        $data['ads'] = HomeAd::all();

        $data['statistics'] = HomeStatistic::all();

        $data['partners'] = Partner::all();

        $data['projects'] = Projects::all();

        $data['latest_news'] = News::with('mainImage')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        $data['banks'] = Banks::all();

        $data['first_bank'] = Banks::all()->first();

        return $data;

    }


    public function getExecutiveData()
    {
        // return CEO
        return BoardMember::query()
            ->where('stage_order', 1)
            ->where('member_order', 1)
            ->first();
    }

    public function getContactUsData(): array
    {
        $data['settings'] = new ContactUsSetting;

        return $data;
    }

    public function getOurServicesData(): array
    {
        $data['services'] = Service::all();

        return $data;
    }

    public function getOurInitiativesData(): array
    {
        $data['initiatives'] = Initiative::active()->paginate(9);

        return $data;
    }

    // {{------------------ About Us ------------------}}
    public function getAboutUsData(): array
    {
        $data['pageSettings'] = (new AboutUsPageSettings);

        $data['values'] = Value::all();
        $data['fields'] = Field::all();

        return $data;
    }

    public function getBoardOfDirectorsData(): array
    {
        // put the data in the same stage order in the same array
        $data['stages'] = BoardMember::query()
            ->with('position')
            ->orderBy('member_order')
            ->get()
            ->groupBy('stage_order');

        return $data;
    }

    public function getGeneralAssemblyMembersData(): array
    {
        $data['members'] = GeneralAssemblyMember::query()
            ->orderBy('order')
            ->paginate(18);

        return $data;
    }

    public function getWorkingTeamData(): array
    {
        $data['members'] = CharityTeamMember::query()
            ->orderBy('order')
            ->paginate(18);

        return $data;
    }

    public function getOrganizationalChartData(): array
    {
        $settings = new OrganizationalStructureSettings;

        $data['image_url'] = OrganizationalStructureSettings::IMAGE_VIEW_PATH . $settings->image;

        return $data;
    }

    // {{------------------ Join Us ------------------}}
    public function getEmploymentData(): array
    {
        $data['settings'] = new EmploymentSettings;
        $data['employment_opportunity'] = EmploymentOpportunity::all();

        return $data;
    }

    public function getVolunteeringData(): array
    {
        $data['settings'] = new VolunteeringSettings;
        $data['volunteer_opportunity'] = VolunteerOpportunity::all();

        return $data;
    }

    public function getMembershipData(): array
    {
        $data['settings'] = new MembershipSettings;
        $data['membership_opportunity'] = MembershipOpportunity::all();

        return $data;
    }

    public function getNews(): array
    {
        $data['news'] = News::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getEvents(): array
    {
        $data['events'] = Event::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getPictures(): array
    {
        $data['pictures'] = Picture::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getRegulations(): array
    {
        $data['regulations'] = Regulation::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getOperationalPlans(): array
    {
        $data['operationalPlans'] = OperationalPlan::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getActivityReports(): array
    {
        $data['activityReports'] = ActivityReport::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getFinancialReports(): array
    {
        $data['financialReports'] = FinancialReport::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getPublicRecords(): array
    {
        $data['publicRecords'] = PublicRecord::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getDisclosuresAndTransparencies(): array
    {
        $data['disclosuresAndTransparencies'] = Transparency::orderByDesc('created_at')->paginate(9);

        return $data;
    }

    public function getOtherGovernance(): array
    {
        $data['otherGovernance'] = OtherGovernance::orderByDesc('created_at')->paginate(9);

        return $data;
    }
}