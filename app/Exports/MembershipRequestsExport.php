<?php

namespace App\Exports;

use App\Models\MembershipRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class MembershipRequestsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{

    public function collection()
    {
        return MembershipRequest::select('id', 'user_id', 'status', 'created_at', 'updated_at')->get();
    }

    public function map($membershipRequest): array
    {
        return [
            $membershipRequest->id,
            $membershipRequest->user_id,
            $membershipRequest->status == 1 ? "pending" : ($membershipRequest->status == 2 ? "accepted" : "rejected"),
            Date::dateTimeToExcel($membershipRequest->created_at),
            Date::dateTimeToExcel($membershipRequest->updated_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => 'yyyy-mm-dd hh:mm:ss',
            'F' => 'yyyy-mm-dd hh:mm:ss',
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'User',
            'Status',
            'Created At',
            'Last Update',
        ];
    }
}
