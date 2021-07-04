<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Exports\TestExport;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
    public function export(){
        return  Excel::download(new TestExport, 'users.xlsx');
    }
    public function exportPdf(){
        return  Excel::download(new TestExport, 'users.pdf');
    }
    public function exportCsv(){
        return  Excel::download(new TestExport, 'users.csv');
    }
}
