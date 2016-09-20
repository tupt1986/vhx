@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ ĐƠN VỊ
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Thêm mới đơn vị huyện - thành phố</h2>
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
            <form class="sky-form" style="border-width: 0px;" action="{{url('/donvi/create')}}" method="post" name="adddonvi" id="adddonvi" >
                {{csrf_field()}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã đơn vị:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="madonvi" placeholder="Nhập mã đơn vị (bắt buộc)" value="{{ old('madonvi') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên đơn vị:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="tendonvi" placeholder="Nhập tên đơn vị (bắt buộc)"  value="{{ old('tendonvi') }}">
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
