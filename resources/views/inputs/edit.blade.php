@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">Thông tin nhập hàng</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Cập nhật phiếu nhập hàng</h3>
            </div>
            <hr>
            <form action="{{ url('/phieu-nhap-hang/' . $ip->ip_id) }}" method="POST" novalidate="novalidate">
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
                                <option value="{{ $item->sp_id }}" {{ $item->sp_id == $ip->sp_id ? 'selected' : '' }}>
                                    {{ $item->sp_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="cc-number" class="control-label mb-1">Thanh toán</label>
                        <select name="ip_status" class="form-control" id="select">
                            <option value="">
                                {{ $ip->ip_status == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</option>
                            <option value="0">Chưa thanh toán</option>
                            <option value="1">Đã thanh toán</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="cc-payment" class="control-label mb-1">Số hóa đơn </label>
                        <input id="cc-pament" name="ip_bill" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" value="{{ $ip->ip_bill }}">
                        <span class="text-danger small">
                            @error('ip_bill')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-6">
                        <label for="cc-payment" class="control-label mb-1">VAT </label>
                        <input id="cc-pament" name="ip_vat" type="number" class="form-control" aria-required="true"
                            aria-invalid="false" value="{{ $ip->ip_vat }}">
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
                            <input id="x_card_code" name="ip_dateinput" type="date" class="form-control cc-cvc"
                                value="{{ $ip->ip_dateinput }}" data-val="true"
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
                            <input id="x_card_code" name="ip_datecreate" type="date" class="form-control cc-cvc"
                                value="{{ $ip->ip_datecreate }}" data-val="true"
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
                        <a href="{{ url('/phieu-nhap-hang') }}" type="reset" class="btn btn-danger btn-sm">
                            <i class="fas fa-reply"></i> Trở lại
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
