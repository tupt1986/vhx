@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ ĐƠN VỊ &nbsp;&nbsp;&nbsp;
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Danh sách đơn vị huyện - thành phố</h2>
    </div>
    <div class="row" align="right">
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/donvi/create')}}', '_self')">
            <i class="icon-home"></i> Thêm mới
        </button>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên đơn vị</th>
            <th>Mã đơn vị</th>
            <th>Chỉnh sửa thông tin</th>
            <th>Xóa đơn vị</th>
        </tr>
        </thead>
        <tbody>
        @foreach($donvis as $donvi)
            <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{$donvi->tendonvi}}</td>
                    <td>{{$donvi->madonvi}}</td>
                <td>
                    <button type="button" class="btn btn-success btn-xs"
                            onclick="window.open('{{url('/donvi/'.$donvi->id)}}', '_self')">Chỉnh sửa thông tin
                    </button>
                </td>
                <td>
                    <form method="POST" action="{{route('donvi.destroy',$donvi->id)}}" onsubmit="return ConfirmDelete();">
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
            var x = confirm("Chắc chắn muốn xóa đơn vị?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
