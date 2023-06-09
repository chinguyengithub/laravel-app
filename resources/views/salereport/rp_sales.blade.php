@extends('app')
@section('content')
    <h3 class="title-5 m-b-35">Báo cáo bán hàng</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
        </div>
        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
            <a href="/saleReportExport" class="btn btn-success"><i class="fa fa-download"></i> Xuất Excel</a>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3 table-bordered">
                    <thead>
                        <tr>
                            <th>Mã phiếu</th>
                            <th>Ngày bán</th>
                            <th>Tên khách hàng</th>
                            <th>Trạng thái đơn hàng </th>
                            <th>Thành tiền bán</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($data) && $data->count())
                            @foreach ($data as $sdt)
                                <tr>
                                    <td>
                                        <span>{{ $sdt->sl_id }}</span>
                                    </td>
                                    <td class="desc">{{ $sdt->created_at }}</td>
                                    <td>{{ $sdt->cus_name }}</td>
                                    <td>{{ $sdt->sl_status }}</td>
                                    <td>{{ $sdt->sdt_totalprice }}</td>
                                    <td></td>



                                    {{-- <td>
                                     @if ($sdt->sl_status == 0)
                                         <span class="badge badge-danger">Chưa thanh toán</span>
                                     @else
                                         <span class="badge badge-success">Đã thanh toán</span>
                                     @endif
                                 </td> --}}
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">Không có dữ liệu.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- <div class="row">{{ $data->appends(request()->all())->links() }}</div> --}}
            <!-- END DATA TABLE-->
        </div>
    </div>
    <!-- END DATA TABLE -->
@endsection
