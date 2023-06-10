@extends('app')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <br>
            <div class="card">
                <span class="border border-danger">
                    <div class="card-header">
                        Thêm sản phẩm vào
                        <strong style="color: rgb(229, 18, 134)">Phiếu nhập hàng</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ url('/phieu-nhap-hang/' . $ip->ip_id . '/create') }}" method="post"
                            class="form-horizontal">
                            @csrf
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <input type="hidden" name="ip_id" value="{{ $ip->ip_id }}">
                            <div class="row">

                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="cc-exp" class="control-label mb-1">Sản phẩm</label>
                                        <select name="prd_id" class="form-control">
                                            <option value="0">Chọn sản phẩm</option>
                                            @foreach ($prd as $item)
                                                <option value="{{ $item->prd_id }}">{{ $item->prd_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger small">
                                            @error('prd_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cc-exp" class="control-label mb-1">Đơn vị tính</label>
                                        <div class=" form-control-label">
                                            <select name="dt_unit" id="select" class="form-control">
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
                                    </div>
                                    <span class="text-danger small">
                                        @error('dt_unit')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Đơn giá nhập</label>
                                    <div class="input-group">
                                        <input id="x_card_code" name="dt_inputprice" type="text"
                                            class="form-control cc-cvc" value="" data-val="true"
                                            data-val-required="Please enter the security code"
                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    </div>
                                    <span class="text-danger small">
                                        @error('dt_inputprice')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Đơn giá VAT</label>
                                    <div class="input-group">
                                        <input id="x_card_code" name="dt_vat" type="tel" class="form-control cc-cvc"
                                            value="" data-val="true"
                                            data-val-required="Please enter the security code"
                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                    </div>
                                    <span class="text-danger small">
                                        @error('dt_vat')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Đơn giá bán</label>
                                    <div class="input-group">
                                        <input id="x_card_code" name="dt_saleprice" type="text"
                                            class="form-control cc-cvc" value="" data-val="true"
                                            data-val-required="Please enter the security code"
                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                    </div><span class="text-danger small">
                                        @error('dt_saleprice')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Số lượng</label>
                                    <div class="input-group">
                                        <input id="x_card_code" name="dt_quatity" type="text" class="form-control cc-cvc"
                                            value="" data-val="true"
                                            data-val-required="Please enter the security code"
                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    </div>
                                    <span class="text-danger small">
                                        @error('dt_quatity')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Số lô</label>
                                    <div class="input-group">
                                        <input id="x_card_code" name="dt_lotnumber" type="text"
                                            class="form-control cc-cvc" value="" data-val="true"
                                            data-val-required="Please enter the security code"
                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    </div>
                                    <span class="text-danger small">
                                        @error('dt_lotnumber')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Hạn dùng</label>
                                    <div class="input-group">
                                        <input id="x_card_code" name="dt_expried" type="date"
                                            class="form-control cc-cvc" value="" data-val="true"
                                            data-val-required="Please enter the security code"
                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                    </div>
                                    <span class="text-danger small">
                                        @error('dt_expried')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                            </div>
                            <div class="col-4">
                                <label for="x_card_code" class="control-label mb-1" type="hidden"></label>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Thêm sản phẩm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </span>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card">
                <span class="border border-success">
                    <div class="card-header">Thông tin nhập hàng</div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2" style="color: rgb(206, 15, 34)">Cập nhật phiếu nhập hàng</h3>
                        </div>
                        <hr>
                        <form action="{{ url('/phieu-nhap-hang/' . $ip->ip_id) }}" method="POST"
                            novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="ip_id" value="{{ $ip->ip_id }}">
                            {{-- @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif --}}

                            <div class="row">
                                <div class="col-8">
                                    <label for="cc-number" class="control-label mb-1">Nhà cung cấp</label>
                                    <select name="sp_id" class="form-control">
                                        <option value="0">Chọn nhà cung cấp</option>
                                        @foreach ($supplier as $item)
                                            <option value="{{ $item->sp_id }}"
                                                {{ $item->sp_id == $ip->sp_id ? 'selected' : '' }}>
                                                {{ $item->sp_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="cc-number" class="control-label mb-1">Thanh toán</label>
                                    <select name="ip_status" class="form-control" id="select">
                                        <option value="{{ $ip->ip_status }}">
                                            {{ $ip->ip_status == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</option>
                                        <option value="0">Chưa thanh toán</option>
                                        <option value="1">Đã thanh toán</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="cc-payment" class="control-label mb-1">Số hóa đơn </label>
                                    <input id="cc-pament" name="ip_bill" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ $ip->ip_bill }}">
                                    <span class="text-danger small">
                                        @error('ip_bill')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-6">
                                    <label for="cc-payment" class="control-label mb-1">VAT </label>
                                    <input id="cc-pament" name="ip_vat" type="number" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ $ip->ip_vat }}">
                                    <span class="text-danger small">
                                        @error('ip_vat')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="x_card_code" class="control-label mb-1">Ngày nhập: </label>
                                    <div class="input-group">
                                        <input id="x_card_code" name="ip_dateinput" type="date"
                                            class="form-control cc-cvc" value="{{ $ip->ip_dateinput }}" data-val="true"
                                            data-val-required="Please enter the security code"
                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    </div>
                                    <span class="text-danger small">
                                        @error('ip_dateinput')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-6">
                                    <label for="x_card_code" class="control-label mb-1">Ngày tạo: </label>
                                    <div class="input-group">
                                        <input id="x_card_code" name="ip_datecreate" type="date"
                                            class="form-control cc-cvc" value="{{ $ip->ip_datecreate }}" data-val="true"
                                            data-val-required="Please enter the security code"
                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    </div>
                                    <span class="text-danger small">
                                        @error('ip_datecreate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i> Cập nhật
                                    </button>
                                    <a href="{{ url('/phieu-nhap-hang') }}" type="reset"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-reply"></i> Trở lại
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </span>
            </div>
        </div>

    </div>
    <h4 style="color:red">Thông tin sản phẩm nhập hàng</h3>
        <div class="row m-t-30">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th style="width: 120px">Số lượng</th>
                                <th style="width:80px;">Đơn vị tính</th>
                                <th style="width:100px;">Số lô</th>
                                <th>Hạn dùng</th>
                                <th>Đơn giá nhập</th>
                                <th>Đơn giá VAT</th>
                                <th>Đơn giá bán</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($inputdetail) && $inputdetail->count())
                                @foreach ($inputdetail as $dt)
                                    <tr>
                                        <td>{{ $dt->prd_name }}</td>
                                        <td>{{ $dt->dt_quatity }}</td>
                                        <td>{{ $dt->dt_unit }}</td>
                                        <td>{{ $dt->dt_lotnumber }}</td>
                                        <td>{{ $dt->dt_expried }}</td>
                                        <td>{{ number_format($dt->dt_inputprice) . ' VND' }}</td>
                                        <td>{{ number_format($dt->dt_vat) . ' VND' }}</td>
                                        <td>{{ number_format($dt->dt_saleprice) . ' VND' }}</td>
                                        <td>
                                            <form
                                                action="{{ url('/phieu-nhap-hang/' . $ip->ip_id . '/' . $dt->dt_id . '/delete') }}"
                                                method="POST">
                                                <div class="table-data-feature">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Xóa"
                                                        onclick="return confirm(&quot;Bạn thật sự muốn xóa phiếu này?&quot;)">
                                                        <i type="submit" class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">Không có dữ liệu.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
