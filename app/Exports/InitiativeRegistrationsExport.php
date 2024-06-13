<?php

namespace App\Exports;

use App\Models\InitiativeRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InitiativeRegistrationsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InitiativeRegistration::query()
            ->with(['user', 'initiative'])
            ->when(request()->has('status'), function ($query) {
                $query->where('status', request()->get('status'));
            })
            ->when(request()->has('initiative_id'), function ($query) {
                $query->where('initiative_id', request()->get('initiative_id'));
            })
            ->get();
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->initiative->name,
            $row->user->name,
            $row->user->email,
            $row->user->phone_number,
            $row->initiative->is_active ? 'Active' : 'Inactive',
            $row->status->name(),
            Date::dateTimeToExcel($row->created_at),
            Date::dateTimeToExcel($row->updated_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => 'yyyy-mm-dd hh:mm:ss',
            'I' => 'yyyy-mm-dd hh:mm:ss',
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Initiative Name',
            'User Name',
            'User Email',
            'User Phone Number',
            'Initiative Status',
            'Registration Status',
            'Created At',
            'Last Update',
        ];
    }
}
