<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class TestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  $user = User::all();
         
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
        ];
    }
}
