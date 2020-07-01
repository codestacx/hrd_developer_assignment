<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DataTables\ExportPdfTableDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{

    public function index(Request $request){
        return view('welcome');
    }

    public function fetchData(Request $request){
        $data =  DataTables::of(Customer::query())->make(true);
        return $data;
    }



}
