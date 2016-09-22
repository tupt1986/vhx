@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ DANH SÁCH MÃ DỊCH VỤ/GIAO DỊCH
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">Thêm mới mã dịch vụ/giao dịch</h2>
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
            <form class="sky-form" style="border-width: 0px;" action="{{url('/dichvu/create')}}" method="post" name="adddichvu" id="adddichvu" >
                {{csrf_field()}}
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã dịch vụ:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="madichvu" placeholder="Nhập mã dịch vụ (bắt buộc)" value="{{ old('madichvu') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên dịch vụ:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="tendichvu" placeholder="Nhập tên dịch vụ (bắt buộc)"  value="{{ old('tendichvu') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Đơn vị tính:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="dvt" value="{{ old('dvt') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tỉ lệ DTTL:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="tileDTTL"  value="{{ old('tileDTTL') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Đơn giá:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="dongia"  value="{{ old('dongia') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã sản lượng tiền thu:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="masanluongtienthu" value="{{ old('masanluongtienthu') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã sản lượng tiền chi:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="masanluongtienchi" value="{{ old('masanluongtienchi') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Mã doanh thu:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="madoanhthu" value="{{ old('madoanhthu') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Tên giao dịch tiền:</label>
                        <div class="col col-8">
                            <label class="input">
                                <input type="text" name="tengiaodichtien" value="{{ old('tengiaodichtien') }}">
                            </label>
                        </div>
                    </div>
                </section>
                <div align='center'>
                    <input type="submit" name="btnAddAndNew" value="Lưu và tiếp tục thêm mới" class="btn-u" width="100px"/>
                    <input type="submit" name="btnAddAndBack" value="Lưu và kết thúc"class="btn-u" width="100px"/>
                    <input type="Button" name="thoat" value="Quay lại"class="btn-u" width="100px" onclick="window.open('{{url('/dichvu')}}', '_self')"/>
                </div>
            </form>
        </div>
    </div><!--/row-->
@endsection
