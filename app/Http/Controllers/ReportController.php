<?php

namespace App\Http\Controllers;
use App\Exports\salereportExport;
use App\Models\Sale_detail;
use App\Models\sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

// namespace App\Http\Controllers;

// use App\Exports\productsExport;
// use App\Models\Product;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Blade;
// use Illuminate\Support\Facades\DB;
// // use Maatwebsite\Excel\Excel;
// use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    // public function index()
    // {
    //     $data = DB::table('sale_details')
    //         ->join('sales', 'sales.sl_id', '=', 'sale_details.sl_id')
    //         ->orderBy('sale_details.sld_id', 'asc')
    //         ->paginate(5);
    //     return view('salereport.rp_sales', compact('data'));
    // }
    public function showrpsales()
    {
        $data = DB::table('sale_details')
            ->join('sales', 'sales.sl_id', '=', 'sale_details.sl_id')
            ->join('customers', 'customers.cus_id', '=', 'sales.cus_id')
            ->orderBy('sale_details.sld_id', 'asc')
            ->paginate(5);
        return view('salereport.rp_sales', compact('data'));
    }

    public function showrpinventory()
    {
        $data = DB::table('products')
            ->join('sale_details', 'sale_details.prd_id', '=', 'products.prd_id')
            // ->join('customers', 'customers.cus_id', '=', 'sales.cus_id')
            ->orderBy('products.prd_id', 'asc')
            ->paginate(5);
        return view('salereport.rp_inventory', compact('data'));
    }
    //export
    public function export(){
        return Excel::download(new saleReportExport,'saleReportExport.xlsx');
    }
}
