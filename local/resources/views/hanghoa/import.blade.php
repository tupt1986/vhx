@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    QUẢN LÝ MÃ VẬT TƯ/HÀNG HÓA
@endsection

@section('content')
    <div class="headline">
        <h2 class="heading-sm">IMPORT MÃ VẬT TƯ/HÀNG HÓA TỪ FILE</h2>
    </div>
    <form action="{{route('hanghoa.import')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <label>Import file:</label>
        <input type="file" name="file">
        <button type="submit">Import</button>
    </form>
@endsection
