<?php

namespace App\Exports;

use App\Models\MailingListSubscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class MailingListSubscribersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MailingListSubscriber::all();
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->email,
            Date::dateTimeToExcel($row->created_at),
            Date::dateTimeToExcel($row->updated_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => 'yyyy-mm-dd hh:mm:ss',
            'D' => 'yyyy-mm-dd hh:mm:ss',
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Email',
            'Created At',
            'Updated At',
        ];
    }
}
