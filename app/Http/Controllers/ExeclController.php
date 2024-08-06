<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

use Maatwebsite\Excel\Facades\Excel;

class ExeclController extends Controller
{
    //
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import(Request $request) 
    {
        Excel::import(new UsersImport, $request->excel);  //$request->excel  (اسمه على حسب ايش سميناه في الفورم)
        
        return "Data imported sucussfully";
    }
}
