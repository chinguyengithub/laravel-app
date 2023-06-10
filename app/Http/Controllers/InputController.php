<?php

namespace App\Http\Controllers;

use App\Models\Input;
use App\Models\Input_detail;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\RunningLaravelDuskInProductionProvider;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('inputs')
            ->join('suppliers', 'suppliers.sp_id', '=', 'inputs.sp_id')
            ->orderBy('inputs.ip_id', 'asc')
            ->paginate(5);
        return view('inputs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        $prd = Product::all();
        return view('inputs.create', compact('supplier', 'prd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ip_bill' => 'required',
            'ip_vat' => 'required',
            'ip_dateinput' => 'required',
            'ip_datecreate' => 'required',
            'sp_id' => 'required',
            'ip_status' => 'required',
        ]);
        $ip = new Input();
        $ip->ip_bill = $request->ip_bill;
        $ip->ip_vat = $request->ip_vat;
        $ip->ip_dateinput = $request->ip_dateinput;
        $ip->ip_datecreate = $request->ip_datecreate;
        $ip->ip_status = $request->ip_status;
        $ip->sp_id = $request->sp_id;
        $ip->save();


        return redirect('/phieu-nhap-hang')->with('success', 'Thêm phiếu nhập hàng thành công!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ip = Input::where('ip_id', $id)
            ->join('suppliers', 'suppliers.sp_id', '=', 'inputs.sp_id')
            ->first();

        $inputdetail = DB::table('input_details')
            ->join('inputs', 'inputs.ip_id', '=', 'input_details.ip_id')
            ->join('products', 'products.prd_id', '=', 'input_details.prd_id')
            ->where('input_details.ip_id', 'LIKE', '%' . $id . '%')
            ->orderBy('input_details.dt_id', 'asc')
            ->paginate(5);
        return view('inputs.show', compact('ip', 'inputdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ip = Input::find($id);
        $supplier = Supplier::all();
        $prd = Product::all();
        $inputdetail = DB::table('input_details')
            ->join('inputs', 'inputs.ip_id', '=', 'input_details.ip_id')
            ->join('products', 'products.prd_id', '=', 'input_details.prd_id')
            ->where('input_details.ip_id', 'LIKE', '%' . $id . '%')
            ->orderBy('input_details.dt_id', 'asc')
            ->paginate(5);
        return view('inputs.edit', compact('ip', 'supplier', 'prd', 'inputdetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ip_bill' => 'required',
            'ip_vat' => 'required',
            'ip_dateinput' => 'required',
            'ip_datecreate' => 'required',
            'ip_status' => 'required',
            'sp_id' => 'required',
        ]);
        $ip = Input::where('ip_id', '=', $id)
            ->update([
                'ip_bill' => $request->ip_bill,
                'ip_vat' => $request->ip_vat,
                'ip_dateinput' => $request->ip_dateinput,
                'ip_datecreate' => $request->ip_datecreate,
                'ip_status' => $request->ip_status,
                'sp_id' => $request->sp_id
            ]);
        return redirect('/phieu-nhap-hang')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ip = Input::find($id);
        $ip->delete();
        return redirect('/phieu-nhap-hang')->with('success', 'Đã xóa thành công!');
    }
    public function storeInputDetail(Request $request, $id)
    {
        $request->validate([
            'dt_quatity' => 'required',
            'dt_unit' => 'required',
            'dt_lotnumber' => 'required',
            'dt_expried' => 'required',
            'dt_vat' => 'required',
            'dt_inputprice' => 'required',
            'dt_saleprice' => 'required',
            'prd_id' => 'required',
            'ip_id' => 'required',
        ]);

        $dt = new Input_detail();
        $dt->ip_id = $id;
        $dt->dt_quatity = $request->dt_quatity;
        $dt->dt_unit = $request->dt_unit;
        $dt->dt_lotnumber = $request->dt_lotnumber;
        $dt->dt_expried = $request->dt_expried;
        $dt->dt_vat = $request->dt_vat;
        $dt->dt_inputprice = $request->dt_inputprice;
        $dt->dt_saleprice = $request->dt_saleprice;
        $dt->prd_id = $request->prd_id;
        $dt->ip_id = $request->ip_id;
        $dt->save();
        return redirect('/phieu-nhap-hang/' . $id . '/edit')->with('success', 'Thêm phiếu nhập hàng thành công!!!');
    }
    public function destroyInputDetail($ip, $id)
    {
        $dt = Input_detail::find($id);
        $dt->delete();
        return redirect('/phieu-nhap-hang/' . $ip . '/edit')->with('success', 'Đã xóa thành công!');
    }
    //search
    public function search(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $data = DB::table('inputs')->select()
            ->join('suppliers', 'suppliers.sp_id', '=', 'inputs.sp_id')
            ->orderBy('inputs.ip_id', 'asc')
            ->where('ip_dateinput','>=',$fromDate)
            ->where('ip_dateinput','<=',$toDate)
            ->paginate(5);
        
        return view('inputs.search', compact('data','fromDate','toDate'));
    }

}