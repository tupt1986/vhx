@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ MÃ VẬT TƯ/HÀNG HÓA
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Danh sách mã vật tư/hàng hóa</h2>
    </div>
    <div class="row" align="right">
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/hanghoa/create')}}', '_self')">
            Thêm mới
        </button>
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/hanghoa/import')}}', '_self')">
            Import
        </button>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã vật tư/hàng hóa</th>
            <th>Tên vật tư/hàng hóa</th>
            <th>Đơn vị tính</th>
            <th>Chỉnh sửa thông tin</th>
            <th>Xóa đơn vị</th>
        </tr>
        </thead>
        <tbody>
        @foreach($hanghoas as $hanghoa)
            <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{$hanghoa->mahanghoa}}</td>
                    <td>{{$hanghoa->tenhanghoa}}</td>
                    <td>{{$hanghoa->dvt}}</td>
                <td>
                    <button type="button" class="btn btn-success btn-xs"
                            onclick="window.open('{{url('/hanghoa/'.$hanghoa->id)}}', '_self')">Chỉnh sửa thông tin
                    </button>
                </td>
                <td>
                    <form method="POST" action="{{route('hanghoa.destroy',$hanghoa->id)}}" onsubmit="return ConfirmDelete();">
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
            var x = confirm("Chắc chắn muốn xóa mã vật tư/hàng hóa?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
