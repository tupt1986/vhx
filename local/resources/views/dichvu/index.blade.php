@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ DANH SÁCH MÃ DỊCH VỤ/GIAO DỊCH
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Danh sách mã dịch vụ/giao dịch</h2>
    </div>
    <div class="row" align="right">
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/dichvu/create')}}', '_self')">
            Thêm mới
        </button>
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/dichvu/import')}}', '_self')">
            Import
        </button>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã dịch vụ</th>
            <th>Tên dịch vụ</th>
            <th>ĐVT</th>
            <th>Tỉ lệ DTTL</th>
            <th>Đơn giá tl/hh</th>
            <th>Mã sltt</th>
            <th>Mã sltc</th>
            <th>Mã dt</th>
            <th>Tên giao dịch tiền</th>
            <th>Chỉnh sửa</th>
            <th>Xóa đơn vị</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dichvus as $dichvu)
            <tr>
                    <td>{{$stt++ }}</td>
                    <td>{{$dichvu->madichvu}}</td>
                    <td>{{$dichvu->tendichvu}}</td>
                    <td>{{$dichvu->dvt}}</td>
                    <td>{{$dichvu->tileDTTL}}</td>
                    <td>{{$dichvu->dongia}}</td>
                    <td>{{$dichvu->masanluongtienthu}}</td>
                    <td>{{$dichvu->masanluongtienchi}}</td>
                    <td>{{$dichvu->madoanhthu}}</td>
                    <td>{{$dichvu->tengiaodichtien}}</td>
                <td>
                    <button type="button" class="btn btn-success btn-xs"
                            onclick="window.open('{{url('/dichvu/'.$dichvu->id)}}', '_self')">Chỉnh sửa thông tin
                    </button>
                </td>
                <td>
                    <form method="POST" action="{{route('dichvu.destroy',$dichvu->id)}}" onsubmit="return ConfirmDelete();">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-success btn-xs">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        function ConfirmDelete() {
            var x = confirm("Chắc chắn muốn xóa mã dịch vụ/giao dịch?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
