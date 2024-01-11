<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;


class ImportsController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('users\import', ['users' => $users]);
    }
    public function store(Request $request)
    {
       $file = $request->file('file');
       Excel::import(new UserImport, $file);
       return back()->with('success', 'All good!');
    }
}
