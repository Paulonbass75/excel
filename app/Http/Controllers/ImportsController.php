<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;


class ImportsController extends Controller
{
    public function fileImportExport()
    {
        return view('file-import');
    }
    public function import() {
        Excel::import(new UserImport, request()-file ('Users_import_1.xlsx'));
        return redirect('/')->with('success', 'All good!');
}
}
