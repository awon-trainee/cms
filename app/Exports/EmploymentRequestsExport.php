<?php

namespace App\Exports;

use App\Models\EmploymentRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EmploymentRequestsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{

    public function collection()
    {
        return EmploymentRequest::select('id', 'user_id', 'status', 'created_at', 'updated_at')->get();
    }

    public function map($employmentRequest): array
    {
        return [
            $employmentRequest->id,
            $employmentRequest->user_id,
            $employmentRequest->status == 1 ? "pending" : ($employmentRequest->status == 2 ? "accepted" : "rejected"),
            Date::dateTimeToExcel($employmentRequest->created_at),
            Date::dateTimeToExcel($employmentRequest->updated_at),
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
