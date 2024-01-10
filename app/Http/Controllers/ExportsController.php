<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\UsersExport;
use App\Imports\UserImport;
use App\Models\Order;
use App\Models\User;
// use Maatwebsite\Excel\Excel;

class ExportsController extends Controller
{
    public function export()
    {
        $users = User::all();
        // $orders = Order::all();
        // return Excel::download(new UsersExport($users), 'users.xlsx');
        // return Excel::store(new UsersExport($users), 'users.xlsx');
        return (new UsersExport($users))->download('users.xlsx');
    //    return (new UsersExport($users));
    }
//     public function import() {
//         Excel::import(new UserImport, 'Users_import_1.xlsx');
//         return redirect('/')->with('success', 'All good!');
// }
}