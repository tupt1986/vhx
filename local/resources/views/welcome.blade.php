@extends('layouts.index')

@if(Session::has('msg'))
    {{Session::get('msg')}}
@endif
@section('title')
    TRANG CHỦ
@endsection

@section('content')
nỘI DUNG TRUNG CHỦ
@endsection
