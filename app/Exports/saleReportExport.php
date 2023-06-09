<?php

namespace App\Exports;

use App\Models\sale_detail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class saleReportExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return sale_detail::select('sl_id','created_at','sdt_totalprice')->get();
        return DB::table('sale_details')
        ->select('sales.sl_id','sales.created_at','customers.cus_name','sales.sl_status','sdt_totalprice')
        ->join('sales', 'sales.sl_id', '=', 'sale_details.sl_id')
        ->join('customers', 'customers.cus_id', '=', 'sales.cus_id')
        ->get();
    }
    // public function styles(Worksheet $sheet)
    // {
    //     return [
    //         // Định dạng toàn bộ hàng đầu tiên với font chữ được in dậm
    //         1    => ['font' => ['bold' => true]],
    //         // Định dạng giá trị tại ô B2 có font là in nghiêng
    //         // 'B2' => ['font' => ['italic' => true]],

    //         // Định dạng font-size cho toàn bộ cột C
    //         // 'C'  => ['font' => ['size' => 16]],
    //     ];
    // }
    public function headings(): array
    {
        return ["Mã phiếu","Ngày bán","Tên khách hàng","Trạng thái", "Thành tiền bán"];
    }
    
}
