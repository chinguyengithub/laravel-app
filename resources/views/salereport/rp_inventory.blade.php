@extends('app')
@section('content')
    <h3 class="title-5 m-b-35">Báo cáo hàng tồn</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
        </div>
        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
            <a href="" class="btn btn-success"><i class="fa fa-download"></i> Xuất Excel</a>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3 table-bordered">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn vị tính</th>
                            <th>Số lượng tồn đầu kì</th>
                            <th>Số lượng xuất</th>
                            <th>Số lượng tồn cuối</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($data) && $data->count())
                            @foreach ($data as $prd)
                                <tr>
                                    <td>
                                        <span>{{ $prd->prd_id }}</span>
                                    </td>
                                    <td class="desc">{{ $prd->prd_name }}</td>
                                    <td>{{ $prd->prd_unit }}</td>
                                    <td></td>



                                    {{-- <td>
                                 @if ($sld->sl_status == 0)
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
            {{-- <div class="row">{{  $data ->appends(request()->all())->links() }}</div>
     <!-- END DATA TABLE--> --}}
        </div>
    </div>
    <!-- END DATA TABLE -->
@endsection
