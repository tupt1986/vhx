@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ BƯU CỤC &nbsp;&nbsp;&nbsp;
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Danh sách bưu cục</h2>
    </div>
    <div class="row" align="right">
        <button class="btn-u btn-brd rounded-4x" onclick="window.open('{{url('/buucuc/create')}}', '_self')">
            <i class="icon-envelope-open"></i> Thêm mới
        </button>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên bưu cục</th>
            <th>Mã bưu cục</th>
            <th>Đơn vị trực thuộc</th>
            <th>Chỉnh sửa thông tin</th>
            <th>Xóa bưu cục</th>
        </tr>
        </thead>
        <tbody>
        @foreach($buucucs as $buucuc)
            <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{$buucuc->tendonvi}}</td>
                    <td>{{$buucuc->madonvi}}<input type="hidden" name="id" value="{{$buucuc->id}}"></td>
                    <td>{{$buucuc->donvi_id}}</td>
                <td>
                    <button type="button" class="btn btn-success btn-xs"
                            onclick="window.open('{{url('/buucuc/'.$buucuc->id)}}', '_self')">Chỉnh sửa thông tin
                    </button>
                </td>
                <td>
                    <form method="POST" action="{{route('buucuc.destroy',$buucuc->id)}}" onsubmit="return ConfirmDelete();">
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
            var x = confirm("Chắc chắn muốn xóa bưu cục?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
