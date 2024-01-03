<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class OrdersExport implements FromCollection, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping, WithTitle
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Order::with('items', 'transactions', 'user')->get();
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_CURRENCY_USD,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'User',
            'Email',
            'Total',
            'Date Rented/Bought',
        ];
    }

    /**
     * @param Order $row
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->user->name,
            $row->user->email,
            $row->total,
            $row->created_at
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Orders';
    }
}
