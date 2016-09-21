@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ MÃ VẬT TƯ/HÀNG HÓA
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Thêm mới mã vật tư/hàng hóa</h2>
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
            <form class="sky-form" style="border-width: 0px;" action="{{url('/hanghoa/create')}}" method="post" name="addhanghoa" id="addhanghoa" >
                {{csrf_field()}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã vật tư/hàng hóa:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="mahanghoa" placeholder="Nhập mã vật tư hàng hóa (bắt buộc)" value="{{ old('mahanghoa') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên vật tư/hàng hóa:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="tenhanghoa" placeholder="Nhập tên vật tư/hàng hóa (bắt buộc)"  value="{{ old('tenhanghoa') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Đơn vị tính:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="dvt" placeholder="Nhập đơn vị tính (bắt buộc)"  value="{{ old('dvt') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <div align='center'>
                    <input type="submit" name="btnAddAndNew" value="Lưu và tiếp tục thêm mới" class="btn-u" width="100px"/>
                    <input type="submit" name="btnAddAndBack" value="Lưu và kết thúc"class="btn-u" width="100px"/>
                    <input type="Button" name="thoat" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/donvi')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
@endsection
