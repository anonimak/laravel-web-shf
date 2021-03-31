<?php

namespace App\Exports;

use App\VisitorUser;
use Maatwebsite\Excel\Concerns\FromCollection;

class VisitorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VisitorUser::all();
    }
}
