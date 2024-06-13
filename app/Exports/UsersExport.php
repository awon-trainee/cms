<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select(['id', 'name', 'email', 'phone_number', 'created_at', 'updated_at'])
            ->withCount(['employmentRequests', 'volunteeringRequests', 'membershipRequests', 'initiativeRegistrations'])
            ->get();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->phone_number,
            $user->employment_requests_count . ' requests',
            $user->volunteering_requests_count . ' requests',
            $user->membership_requests_count . ' requests',
            $user->initiative_registrations_count . ' registrations',
            Date::dateTimeToExcel($user->created_at),
            Date::dateTimeToExcel($user->updated_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => 'yyyy-mm-dd hh:mm:ss',
            'J' => 'yyyy-mm-dd hh:mm:ss',
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Phone Number',
            'Employment Requests Count',
            'Volunteering Requests Count',
            'Membership Requests Count',
            'Initiative Registrations Count',
            'Created At',
            'Last Update',
        ];
    }
}
