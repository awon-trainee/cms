<?php

namespace App\Exports;

use App\Models\ContactMessage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ContactMessagesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ContactMessage::all();
    }

    public function map($contactMessage): array
    {
        return [
            $contactMessage->id,
            $contactMessage->name,
            $contactMessage->email,
            $contactMessage->phone,
            $contactMessage->message,
            $contactMessage->type->name(),
            $contactMessage->status->name(),
            Date::dateTimeToExcel($contactMessage->created_at),
            Date::dateTimeToExcel($contactMessage->updated_at),
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
            'Name',
            'Email',
            'Phone Number',
            'Message',
            'Type',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}
