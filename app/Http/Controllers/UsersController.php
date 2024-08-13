<?php

namespace App\Http\Controllers;

use App\Imports\AlumniImport;
use App\Models\Alumni;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function import(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'file' => 'required|mimes:xls,xlsx'
        // ]);

        $file = $request->file('file');

        Excel::import(new AlumniImport, $file);

        return response()->json(['message' => 'File imported successfully!']);
    }
}
