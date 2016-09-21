<?php

namespace vhx\Http\Controllers;

use Illuminate\Http\Request;

use vhx\Http\Requests;
use vhx\donvi;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class DonviController extends Controller
{
    //
    public function index()
    {
        $donvis = donvi::all();
        $stt = 1;
        return view('donvi.index', [
            'donvis' => $donvis,
            'stt' => $stt,
        ]);
    }

    //create don vi
    public function create()
    {
        return view('donvi.create');
    }

    //save new donvi
    public function store(Request $request)
    {

        //validate
        $this->validate($request, [
            'madonvi' => 'required|unique:donvis|digits:4|',
            'tendonvi' => 'required|max:50',
        ], [
            'madonvi.required' => 'Nhập mã đơn vị (bắt buộc)',
            'madonvi.unique' => 'Mã đơn vị đã tồn tại',
            'madonvi.digits' => 'Mã đơn vị phải là 4 chữ số',
            'tendonvi.required' => 'Nhập tên đơn vị (bắt buộc)',
            'tendonvi.max' => 'Tên đơn vị tối đa 50 ký tự',
        ]);
        //save donvi
        $donvi = new Donvi();
        $donvi->madonvi = $request->madonvi;
        $donvi->tendonvi = $request->tendonvi;

        $donvi->save();

        //redirect
        flash()->overlay('Đơn vị <b>' . $donvi->tendonvi . '</b> đã được thêm mới thành công. ', 'Thêm mới đơn vị huyện - thành phố');
        if ($request->btnAddAndBack)
            return redirect('/donvi');
        elseif ($request->btnAddAndNew)
            return redirect('/donvi/create');
    }

    public function destroy($id)
    {
        $donvi = donvi::findOrFail($id);
        //$user -> delete();
        if ($donvi->delete()) {
            flash()->overlay('Đơn vị <b>' . $donvi->tendonvi . '</b> đã được xóa thành công. ', 'Xóa đơn vị');
        } else {
            flash()->overlay('Đơn vị <b>' . $donvi->tendonvi . '</b> xóa không thành công. ', 'Xóa đơn vị');
        }
        return redirect('/donvi');
    }

    public function edit($id)
    {
        $donvi = Donvi::findOrFail($id);
        return view('donvi.edit', [
            'donvi' => $donvi
        ]);
    }

    public function update($id, Request $request)
    {
        //validate
        $this->validate($request, [
            'madonvi' => 'required|digits:4|unique:donvis,madonvi,' . $id,
            'tendonvi' => 'required|max:50',
        ], [
            'madonvi.required' => 'Nhập mã đơn vị (bắt buộc)',
            'madonvi.unique' => 'Mã đơn vị đã tồn tại',
            'madonvi.digits' => 'Mã đơn vị phải là 4 chữ số',
            'tendonvi.required' => 'Nhập tên đơn vị (bắt buộc)',
            'tendonvi.max' => 'Tên đơn vị tối đa 50 ký tự',
        ]);

        $donvi = donvi::findOrFail($id);
        $donvi->update($request->all());
        flash()->overlay('Thông tin đơn vị <b>' . $donvi->tendonvi . '</b> đã thay đổi thành công.', 'Thay đổi thông tin đơn vị.');
        return redirect('/donvi');
    }

    public function import()
    {
        return view('donvi.import');
    }

    public function export()
    {
        $users = donvi::select('madonvi', 'tendonvi')->get();
        Excel::create('export data', function ($excel) use ($users) {
            $excel->sheet('DS nguoi dung', function ($sheet) use ($users) {
                $sheet->fromArray($users);
            })->export('xlsx');
        });
        return redirect('/donvi');
    }

    public function insert()
    {
        Excel::load(Input::file('file'), function ($reader) {
            $reader->each(function ($sheet) {
                foreach ($sheet->toArray() as $row) {
                    $donvi = new donvi();
                    $donvi->madonvi = $row['madonvi'];
                    $donvi->tendonvi = $row['tendonvi'];
                    $donvi->save();
                    //donvi::firstOrCreate($row);
                }
            });
        });
        return redirect('/donvi');
    }

}
