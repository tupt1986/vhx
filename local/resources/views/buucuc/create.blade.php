@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ BƯU CỤC
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Thêm mới bưu cục</h2>
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
            <form class="sky-form" style="border-width: 0px;" action="{{url('/buucuc/create')}}" method="post" name="addbuucuc" id="addbuucuc" >
                {{csrf_field()}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã bưu cục:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="mabuucuc" placeholder="Nhập mã bưu cục (bắt buộc)" value="{{ old('mabuucuc') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên bưu cục:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="tenbuucuc" placeholder="Nhập tên bưu cục (bắt buộc)" value="{{ old('tenbuucuc') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Đơn vị trực thuộc</label>
                        <div class="col col-8">
                            <label class="select">
                                <select name="donvi_id" id="donvi_id">
                                    <option selected disabled>Chọn đơn vị trực thuộc</option>
                                    @foreach($donvis as $donvi)
                                        <option value="{{$donvi->id}}" {{(old('donvi_id')==$donvi->id) ? 'selected' : ''}}>{{$donvi->madonvi}} - {{$donvi->tendonvi}}</option>
                                        @endforeach
                                </select>
                                <i></i>
                            </label>
                        </div>
                    </div>
                </section>
                <div align='center'>
                    <input type="submit" name="btnAddAndNew" value="Lưu và tiếp tục thêm mới" class="btn-u" width="100px"/>
                    <input type="submit" name="btnAddAndBack" value="Lưu và kết thúc"class="btn-u" width="100px"/>
                    <input type="Button" name="thoat" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/buucuc')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
@endsection
