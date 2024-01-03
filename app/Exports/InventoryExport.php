<?php

namespace App\Exports;

use App\Models\Item;
use App\Models\ItemState;
use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class InventoryExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Item::with('itemCategory', 'itemState', 'itemType', 'price')->get();
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
//            'D' => NumberFormat::FORMAT_CURRENCY_USD,
//            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Quantity',
            'Price',
            'Category',
            'Type',
            'State',
        ];
    }

    /**
     * @param Order $row
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->quantity,
            $row->price,
            $row->item_category,
            $row->item_type,
            $row->item_state
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Items';
    }
}
