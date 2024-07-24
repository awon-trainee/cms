<?php

namespace App\Exports;

use App\Models\VolunteeringRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class VolunteerRequestsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{

    public function collection()
    {
        return VolunteeringRequest::select('id', 'user_id', 'status', 'created_at', 'updated_at')->get();
    }

    public function map($volunteerRequest): array
    {
        return [
            $volunteerRequest->id,
            $volunteerRequest->user_id,
            $volunteerRequest->status == 1 ? "pending" : ($volunteerRequest->status == 2 ? "accepted" : "rejected"),
            Date::dateTimeToExcel($volunteerRequest->created_at),
            Date::dateTimeToExcel($volunteerRequest->updated_at),
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
