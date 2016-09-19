@extends('layouts.index')
@section('title', 'THAY ĐỔI THÔNG TIN NGƯỜI DÙNG')

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Chỉnh sửa thông tin người dùng</h2>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <form action="{{url('/users/'.$user->id)}}" class="reg-page" method="post" name="edituser" id="edituser" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Họ tên" class="form-control" id ='name' name ='name' value="{{$user->name}}">
                </div><div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Họ tên" class="form-control" id ='username' name ='username' value="{{$user->username}}">
                </div>
                <div align='center'>
                    <input type="submit" name="edit" value="Thay đổi"class="btn-u" width="100px"/>
                    <input type="button" name="back" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/users')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div>


@endsection
