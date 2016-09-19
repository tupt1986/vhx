@extends('layouts.index')
@section('title')
    <i class="icon-user-follow"></i> THÊM MỚI NGƯỜI DÙNG
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Thông tin người dùng thêm mới</h2>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-success fade in margin-bottom-40">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <form action="{{url('/users/create')}}" class="reg-page" method="post" name="adduser" id="adduser" >
                {{csrf_field()}}
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Họ tên" class="form-control" id='name' name='name'>
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Tên đăng nhập" class="form-control" id='username' name='username'>
                </div>
                <div class="sky-form" style="border-width: 0px;">
                    <label class="label">Quyền truy cập người dùng:</label>
                    <div class="inline-group">
                        <label class="toggle">
                            <input type="checkbox" name="role_user" id="role_user">
                            <i></i>
                            Người dùng
                        </label>
                        <label class="toggle">
                            <input type="checkbox" name="role_manager" id="role_manager">
                            <i></i>
                            Quản lý
                        </label>
                        <label class="toggle">
                            <input type="checkbox" name="role_admin" id="role_admin">
                            <i></i>
                            Quản trị viên
                        </label>
                    </div>
                </div>
                <div align='center'>
                    <input type="submit" name="add" value="Thêm mới" class="btn-u" width="100px"/>
                    <input type="button" name="back" value="Quay lại" class="btn-u" width="100px"
                           onclick="window.open('{{url('/users')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div>
@endsection
