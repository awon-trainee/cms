<?php

namespace App\Exports;

use App\Models\Initiative;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InitiativesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{

    public function collection()
    {
        return Initiative::select('id', 'name', 'description', 'is_active', 'created_at', 'updated_at')
            ->withCount('registrations')
            ->get();
    }

    public function map($initiative): array
    {
        return [
            $initiative->id,
            $initiative->name,
            $initiative->description,
            $initiative->is_active ? 'Active' : 'Inactive',
            $initiative->registrations_count . ' registrations',
            Date::dateTimeToExcel($initiative->created_at),
            Date::dateTimeToExcel($initiative->updated_at),
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
            'Name',
            'Description',
            'Is Active',
            'Registrations Count',
            'Created At',
            'Last Update',
        ];
    }
}
