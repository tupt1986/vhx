<?php

namespace vhx\Http\Controllers;

use Illuminate\Http\Request;

use vhx\Http\Requests;
use vhx\hanghoa;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class HanghoaController extends Controller
{
    public function index()
    {
        $hanghoas = hanghoa::all();
        $stt = 1;
        return view('hanghoa.index', [
            'hanghoas' => $hanghoas,
            'stt' => $stt,
        ]);
    }

    //create don vi
    public function create()
    {
        return view('hanghoa.create');
    }

    //save new donvi
    public function store(Request $request)
    {

        //validate
        $this->validate($request, [
            'mahanghoa' => 'required|unique:hanghoas|max:20',
            'tenhanghoa' => 'required|max:50',
            'dvt' => 'required|max:20',
        ], [
            'mahanghoa.required' => 'Nhập mã hàng hóa',
            'mahanghoa.unique' => 'Mã hàng hóa đã tồn tại',
            'mahanghoa.max' => 'Mã hàng hóa tối đa 20 ký tự',
            'tenhanghoa.required' => 'Nhập tên hàng hóa',
            'tenhanghoa.max' => 'Tên hàng hóa tối đa 50 ký tự',
            'dvt.required' => 'Nhập đơn vị tính',
            'dvt.max' => 'Đơn vị tính tối đa 20 ký tự',
        ]);

        $hanghoa = new hanghoa();
        $hanghoa->mahanghoa = $request->mahanghoa;
        $hanghoa->tenhanghoa = $request->tenhanghoa;
        $hanghoa->dvt = $request->dvt;
        $hanghoa->save();

        //redirect
        flash()->overlay('Mã vật tư/hàng hóa <b>' . $hanghoa->tenhanghoa . '</b> đã được thêm mới thành công. ', 'Thêm mới mã vật tư/hàng hóa');
        if ($request->btnAddAndBack)
            return redirect('/hanghoa');
        elseif ($request->btnAddAndNew)
            return redirect('/hanghoa/create');
    }

    public function destroy($id)
    {
        $hanghoa = hanghoa::findOrFail($id);
        //$user -> delete();
        if ($hanghoa->delete()) {
            flash()->overlay('Mã vật tư/hàng hóa <b>' . $hanghoa->tenhanghoa . '</b> đã được xóa thành công. ', 'Xóa mã vật tư/hàng hóa');
        } else {
            flash()->overlay('Mã vật tư/hàng hóa <b>' . $hanghoa->tenhanghoa . '</b> xóa không thành công. ', 'Xóa mã vật tư/hàng hóa');
        }
        return redirect('/hanghoa');
    }

    public function edit($id)
    {
        $hanghoa = hanghoa::findOrFail($id);
        return view('hanghoa.edit', [
            'hanghoa' => $hanghoa
        ]);
    }

    public function update($id, Request $request)
    {
        //validate
        $this->validate($request, [
            'mahanghoa' => 'required|max:20|unique:hanghoas,mahanghoa,' . $id,
            'tenhanghoa' => 'required|max:50',
            'dvt' => 'required|max:20',
        ], [
            'mahanghoa.required' => 'Nhập mã hàng hóa',
            'mahanghoa.unique' => 'Mã hàng hóa đã tồn tại',
            'mahanghoa.max' => 'Mã hàng hóa tối đa 20 ký tự',
            'tenhanghoa.required' => 'Nhập tên hàng hóa',
            'tenhanghoa.max' => 'Tên hàng hóa tối đa 50 ký tự',
            'dvt.required' => 'Nhập đơn vị tính',
            'dvt.max' => 'Đơn vị tính tối đa 20 ký tự',
        ]);

        $hanghoa = hanghoa::findOrFail($id);
        $hanghoa->update($request->all());
        flash()->overlay('Thông tin mã vật tư/hàng hóa <b>' . $hanghoa->tenhanghoa . '</b> đã thay đổi thành công.', 'Thay đổi thông tin mã vật tư/hàng hóa.');
        return redirect('/hanghoa');
    }

    public function import()
    {
        return view('hanghoa.import');
    }

//    public function export()
//    {
//        $users = donvi::select('madonvi', 'tendonvi')->get();
//        Excel::create('export data', function ($excel) use ($users) {
//            $excel->sheet('DS nguoi dung', function ($sheet) use ($users) {
//                $sheet->fromArray($users);
//            })->export('xlsx');
//        });
//        return redirect('/donvi');
//    }

    public function insert()
    {
        Excel::load(Input::file('file'), function ($reader) {
            $reader->each(function ($sheet) {
                foreach ($sheet->toArray() as $row) {
                    $hanghoa = new hanghoa();
                    $hanghoa->mahanghoa = $row['mahanghoa'];
                    $hanghoa->tenhanghoa = $row['tenhanghoa'];
                    $hanghoa->dvt = $row['dvt'];
                    $hanghoa->save();
                }
            });
        });
        return redirect('/hanghoa');
    }

}
