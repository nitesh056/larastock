<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsExport implements FromQuery, ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\FromQuery
    */
    public function query()
    {
        return Product::query();
    }
}
