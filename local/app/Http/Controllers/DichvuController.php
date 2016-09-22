<?php

namespace vhx\Http\Controllers;

use Illuminate\Http\Request;

use vhx\Http\Requests;
use vhx\dichvu;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class DichvuController extends Controller
{
    public function index()
    {
        $dichvus = dichvu::all();
        $stt = 1;
        return view('dichvu.index', [
            'dichvus' => $dichvus,
            'stt' => $stt,
        ]);
    }

    //create don vi
    public function create()
    {
        return view('dichvu.create');
    }

    //save new donvi
    public function store(Request $request)
    {

        //validate
        $this->validate($request, [
            'madichvu' => 'required|unique:dichvus|max:10',
            'tendichvu' => 'required|max:255',
            'dvt'=>'max:20',
            'tileDTTL'=>'integer',
            'dongia'=>'integer',
            'masanluongtienthu'=>'max:20',
            'masanluongtienchi'=>'max:20',
            'madoanhthu'=>'max:20',
            'tengiaodichtien'=>'max:100',
        ], [
            'madichvu.required' => 'Nhập mã hàng hóa',
            'madichvu.unique' => 'Mã hàng hóa đã tồn tại',
            'madichvu.max' => 'Mã hàng hóa tối đa 10 ký tự',
            'tendichvu.required' => 'Nhập tên hàng hóa',
            'tendichvu.max' => 'Tên hàng hóa tối đa 255 ký tự',
        ]);

        $dichvu = new dichvu();
        $dichvu->madichvu = $request->madichvu;
        $dichvu->tendichvu = $request->tendichvu;
        $dichvu->dvt = $request->dvt;
        $dichvu->tileDTTL = $request->tileDTTL;
        $dichvu->dongia = $request->dongia;
        $dichvu->masanluongtienthu = $request->masanluongtienthu;
        $dichvu->masanluongtienchi = $request->masanluongtienchi;
        $dichvu->madoanhthu = $request->madoanhthu;
        $dichvu->tengiaodichtien = $request->tengiaodichtien;
        $dichvu->save();

        //redirect
        flash()->overlay('Mã dịch vụ/giao dịch <b>' . $dichvu->tenhanghoa . '</b> đã được thêm mới thành công. ', 'Thêm mới mã dịch vụ/giao dịch');
        if ($request->btnAddAndBack)
            return redirect('/dichvu');
        elseif ($request->btnAddAndNew)
            return redirect('/dichvu/create');
    }

    public function destroy($id)
    {
        $dichvu = dichvu::findOrFail($id);
        //$user -> delete();
        if ($dichvu->delete()) {
            flash()->overlay('Mã dịch vụ/giao dịch <b>' . $dichvu->tendichvu . '</b> đã được xóa thành công. ', 'Xóa mã dịch vụ/giao dịch');
        } else {
            flash()->overlay('Mã dịch vụ/giao dịch <b>' . $dichvu->tendichvu . '</b> xóa không thành công. ', 'Xóa mã dịch vụ/giao dịch');
        }
        return redirect('/dichvu');
    }

    public function edit($id)
    {
        $dichvu = dichvu::findOrFail($id);
        return view('dichvu.edit', [
            'dichvu' => $hanghoa
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
        return view('dichvu.import');
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
                    var_dump($row);
                    $dichvu = new dichvu();
                    $dichvu->madichvu = $row['madichvu'];
                    $dichvu->tendichvu = $row['tendichvu'];
                    $dichvu->dvt = $row['dvt'];
                    $dichvu->tileDTTL = $row['tiledttl'];
                    $dichvu->dongia = $row['dongia'];
                    $dichvu->masanluongtienthu = $row['masanluongtienthu'];
                    $dichvu->masanluongtienchi = $row['masanluongtienchi'];
                    $dichvu->madoanhthu = $row['madoanhthu'];
                    $dichvu->tengiaodichtien = $row['tengiaodichtien'];
                    $dichvu->save();
                }
            });
        });
        return redirect('/dichvu');
    }

}
