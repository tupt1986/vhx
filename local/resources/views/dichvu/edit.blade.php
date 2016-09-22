@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ MÃ VẬT TƯ/HÀNG HÓA
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Chỉnh sửa thông tin mã vật tư/hàng hóa</h2>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-success fade in margin-bottom-40">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-5 col-sm-offset-1">
            <form class="sky-form" style="border-width: 0px;" action="{{url('/hanghoa/'.$hanghoa->id)}}" method="post" name="edithanghoa" id="edithanghoa" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã vật tư/hàng hóa:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="mahanghoa" placeholder="Nhập mã vật tư/hàng hóa (bắt buộc)" value="{{$hanghoa->mahanghoa}}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên vật tư/hàng hóa:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="tenhanghoa" placeholder="Nhập tên vật tư/hàng hóa (bắt buộc)"  value="{{$hanghoa->tenhanghoa}}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Đơn vị tính:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="dvt" placeholder="Nhập đơn vị tính"  value="{{$hanghoa->dvt}}">
                            </label>
                        </div>
                    </div>
                </section>
                <div align='center'>
                    <input type="submit" name="btnEdit" value="Lưu thay đổi"class="btn-u" width="100px"/>
                    <input type="Button" name="thoat" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/hanghoa')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
@endsection
