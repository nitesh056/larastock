<?php

namespace App\Exports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionsExport implements FromQuery, ShouldAutoSize
{
	use Exportable;

    /**
    * @return \Illuminate\Support\FromQuery
    */
    public function query()
    {
        return Transaction::query();
    }
}
