@extends('app')
@section('content')
    <div class="card">
        <span class="border border-warning">
            <div class="card-header">Thông tin nhập hàng</div>
            <div class="card-body">
                <form action="{{ url('/phieu-nhap-hang') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label for="x_card_code" class="control-label mb-1">Số hóa đơn </label>
                            <input id="cc-pament" name="ip_bill" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">
                            <span class="text-danger small">
                                @error('ip_bill')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-6">
                            <label for="x_card_code" class="control-label mb-1">Nhà cung cấp</label>
                            <select name="sp_id" class="form-control">
                                <option value="0">Chọn nhà cung cấp</option>
                                @foreach ($supplier as $item)
                                    <option value="{{ $item->sp_id }}">{{ $item->sp_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="cc-number" class="control-label mb-1">Thanh toán</label>
                            <select name="ip_status" class="form-control" id="select">
                                <option value="">Chọn thanh toán</option>
                                <option value="0">Chưa thanh toán</option>
                                <option value="1">Đã thanh toán</option>
                            </select>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="x_card_code" class="control-label mb-1">VAT</label>
                            <input id="cc-pament" name="ip_vat" type="number" class="form-control" aria-required="true"
                                aria-invalid="false">
                            <span class="text-danger small">
                                @error('ip_vat')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            <label for="x_card_code" class="control-label mb-1">Ngày nhập: </label>
                            <div class="input-group">
                                <input id="x_card_code" name="ip_dateinput" type="date" class="form-control cc-cvc"
                                    value="" data-val="true" data-val-required="Please enter the security code"
                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                            </div>
                            <span class="text-danger small">
                                @error('ip_dateinput')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            <label for="x_card_code" class="control-label mb-1">Ngày tạo: </label>
                            <div class="input-group">
                                <input id="x_card_code" name="ip_datecreate" type="date" class="form-control cc-cvc"
                                    value="" data-val="true" data-val-required="Please enter the security code"
                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                            </div>
                            <span class="text-danger small">
                                @error('ip_datecreate')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <br><br>
                    {{-- </span> --}}

                    <h4 style="color:red">Thông tin sản phẩm nhập hàng</h3>
                        <br>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-white" id="tableInputDetails">
                                        <thead>
                                            <tr>
                                                <th>Mã hàng</th>
                                                <th>Sản phẩm</th>
                                                <th style="width: 10px">Số lượng</th>
                                                <th style="width:80px;">Đơn vị tính</th>
                                                <th style="width:100px;">Số lô</th>
                                                <th>Hạn dùng</th>
                                                <th>Đơn giá nhập</th>
                                                <th>Đơn giá VAT</th>
                                                <th>Đơn giá bán</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input class="form-control" style="min-width:100px" type="text"
                                                        id="item" name="dt_id[]"></td>
                                                <td>
                                                    <select name="prd_id" class="form-control" style="min-width:300px">
                                                        <option value="0">Chọn sản phẩm</option>
                                                        @foreach ($prd as $item)
                                                            <option value="{{ $item->prd_id }}">{{ $item->prd_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input class="form-control"style="min-width:60px" type="number"
                                                        value="0" id="description" name="dt_quatity[]"></td>
                                                <td>
                                                    <div class=" form-control-label">
                                                        <select name="dt_unit" id="select" class="form-control"
                                                            style="min-width:200px">
                                                            <option value="0">Chọn đơn vị tính</option>
                                                            <option value="Kg">Kg</option>
                                                            <option value="Bộ">Bộ</option>
                                                            <option value="Lốc">Lốc</option>
                                                            <option value="Lon">Lon</option>
                                                            <option value="Cái">Cái</option>
                                                            <option value="Chai">Chai</option>
                                                            <option value="Bịch">Bịch</option>
                                                            <option value="Thùng">Thùng</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td><input class="form-control qty" style="width:80px" type="text"
                                                        id="qty" name="dt_lotnumber[]"></td>
                                                <td><input class="form-control" style="min-width:200px" type="date"
                                                        id="item" name="dt_expried[]"></td>
                                                <td><input class="form-control"style="min-width:150px" type="text"
                                                        id="description" name="dt_inputprice[]" value="0"></td>
                                                {{-- <td><input class="form-control total" style="width:120px" type="text"
                                                        id="amount" name="amount[]" value="0" readonly></td> --}}
                                                <td><input class="form-control unit_price" style="width:100px"
                                                        type="text" id="unit_cost" name="dt_vat[]" value="0">
                                                </td>
                                                <td><input class="form-control unit_price" style="width:100px"
                                                        type="text" name="dt_saleprice[]" value="0"></td>
                                                <td><a href="javascript:void(0)" class="text-success font-18"
                                                        title="Add" id="addBtn"><i class="fa fa-plus"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>
                </form>
            </div>
    </div>
@section('script')
    <script type="text/javascript">
        var i = 1;
        $('#addBtn').click(function() {
            i++;
            $('#tableInputDetails').append(
                `<tr">
                    <td><input class="form-control" style="min-width:100px" type="text" id="item" name="dt_id[]"></td>
                    <td>
                        <select name="prd_id" class="form-control" style="min-width:300px">
                            <option value="0">Chọn sản phẩm</option>
                            @foreach ($prd as $item)
                                <option value="{{ $item->prd_id }}">{{ $item->prd_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input class="form-control"style="min-width:60px" type="number" value="0" id="description" name="dt_quatity[]"></td>
                    <td>
                        <div class=" form-control-label">
                            <select name="dt_unit" id="select" class="form-control"
                                style="min-width:200px">
                                <option value="0">Chọn đơn vị tính</option>
                                <option value="Kg">Kg</option>
                                <option value="Bộ">Bộ</option>
                                <option value="Lốc">Lốc</option>
                                <option value="Lon">Lon</option>
                                <option value="Cái">Cái</option>
                                <option value="Chai">Chai</option>
                                <option value="Bịch">Bịch</option>
                                <option value="Thùng">Thùng</option>
                            </select>
                        </div>
                    </td>
                    <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="dt_lotnumber[]"></td>
                    <td><input class="form-control" style="min-width:200px" type="date" id="item" name="dt_expried[]"></td>
                    <td><input class="form-control"style="min-width:150px" type="text" id="description" name="dt_inputprice[]" value="0"></td>
                    <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="dt_vat[]" value="0"></td>
                    <td><input class="form-control unit_price" style="width:100px" type="text" name="dt_saleprice[]" value="0"></td>
                    <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                </tr>`);
        });
        $(document).on('click', 'remove', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
@endsection
