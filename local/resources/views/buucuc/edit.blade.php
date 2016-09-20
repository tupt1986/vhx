@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ BƯU CỤC
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Chỉnh sửa thông tin bưu cục</h2>
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
            <form class="sky-form" style="border-width: 0px;" action="{{url('/buucuc/'.$buucuc->id)}}" method="post" name="editbuucuc" id="editbuucuc" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã bưu cục:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="madonvi" placeholder="Nhập mã bưu cục (bắt buộc)" value="{{$buucuc->madonvi}}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên bưu cục:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="tendonvi" placeholder="Nhập tên bưu cục (bắt buộc)" value="{{$buucuc->tendonvi}}">
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
                                    @foreach($list_donvi as $donvi)
                                        <option value="{{$donvi->id}}" {{($buucuc->donvi_id == $donvi->id) ? 'selected' : ''}}>{{$donvi->madonvi}} - {{$donvi->tendonvi}}</option>
                                        @endforeach
                                </select>
                                <i></i>
                            </label>
                        </div>
                    </div>
                </section>
                <div align='center'>
                    <input type="submit" name="btnEdit" value="Lưu thay đổi"class="btn-u" width="100px"/>
                    <input type="Button" name="thoat" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/buucuc')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
@endsection
