<?php

namespace vhx\Http\Controllers;

use Illuminate\Http\Request;

use vhx\Http\Requests;
use vhx\donvi;
use vhx\buucuc;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class BuucucController extends Controller
{
    public function index (){
        $buucucs = buucuc::all();
        $stt = 1;

        return view('buucuc.index',[
            'buucucs'=>$buucucs,
            'stt'=>$stt,
        ]);
    }

    public function create(){
        $donvis = donvi::all();

        return view('buucuc.create',[
            'donvis'=>$donvis,
        ]);
    }

    public function store(Request $request){

        //validate
        $this->validate($request,[
            'mabuucuc'=>'required|unique:buucucs|digits:6|',
            'tenbuucuc'=>'required|max:50',
            'donvi_id'=>'required',
        ],[
            'mabuucuc.required'=>'Nhập mã đơn vị (bắt buộc)',
            'mabuucuc.unique'=>'Mã đơn vị đã tồn tại',
            'mabuucuc.digits'=>'Mã đơn vị phải là 6 chữ số',
            'tenbuucuc.required'=>'Nhập tên đơn vị (bắt buộc)',
            'tenbuucuc.max'=>'Tên đơn vị tối đa 50 ký tự',
            'donvi_id.required'=>'Chọn đơn vị trực thuộc'
        ]);
        //save donvi
        $buucuc = new buucuc();
        $buucuc->mabuucuc = $request->mabuucuc;
        $buucuc->tenbuucuc = $request->tenbuucuc;
        $buucuc->donvi_id = $request->donvi_id;

        $buucuc->save();

        //redirect
        flash()->overlay('Bưu cục <b>'.$buucuc->tenbuucuc.'</b> đã được thêm mới thành công. ','Thêm mới bưu cục');
        if($request->btnAddAndBack)
            return redirect('/buucuc');
        elseif($request->btnAddAndNew)
            return redirect('/buucuc/create');
    }

    public function destroy($id){
        $buucuc = buucuc::findOrFail($id);
        //$user -> delete();
        if ($buucuc -> delete()) {
            flash()->overlay('Bưu cục <b>'.$buucuc->tenbuucuc.'</b> đã được xóa thành công. ','Xóa bưu cục');
        }
        else{
            flash()->overlay('Bưu cục <b>'.$buucuc->tenbuucuc.'</b> xóa không thành công. ','Xóa bưu cục');
        }
        return redirect('/buucuc');
    }

    public function edit($id){
        $buucuc = buucuc::findOrFail($id);
        $donvis = donvi::all();

        return view('buucuc.edit',[
            'buucuc'=>$buucuc,
            'donvis'=>$donvis,
        ]);
    }

    public function update($id, Request $request){
        //validate
        $this->validate($request,[
            'mabuucuc'=>'required|digits:6|unique:buucucs,mabuucuc,'.$id,
            'tenbuucuc'=>'required|max:50',
            'donvi_id'=>'required',
        ],[
            'mabuucuc.required'=>'Nhập mã đơn vị (bắt buộc)',
            'mabuucuc.unique'=>'Mã đơn vị đã tồn tại',
            'mabuucuc.digits'=>'Mã đơn vị phải là 6 chữ số',
            'tenbuucuc.required'=>'Nhập tên đơn vị (bắt buộc)',
            'tenbuucuc.max'=>'Tên đơn vị tối đa 50 ký tự',
            'donvi_id.required'=>'Chọn đơn vị trực thuộc'
        ]);

        $buucuc = buucuc::findOrFail($id);
        $buucuc->update($request->all());
        flash()->overlay('Thông tin bưu cục <b>'.$buucuc->tenbuucuc.'</b> đã thay đổi thành công.','Thay đổi thông tin bưu cục.');
        return redirect('/buucuc');

    }
    public function import()
    {
        return view('buucuc.import');
    }
    public function export()
    {
        $users = donvi::select('mabuucuc', 'tenbuucuc','donvi_id')->get();
        Excel::create('export data', function($excel) use($users){
            $excel->sheet('DS nguoi dung', function($sheet) use($users){
                $sheet->fromArray($users);
            })->export('xlsx');
        });
        return redirect('/buucuc');
    }

    public function insert(){
        Excel::load(Input::file('file'), function ($reader){
            $reader->each(function ($sheet){
                foreach ($sheet->toArray() as $row){
                    $buucuc = new buucuc();
                    $buucuc->mabuucuc = $row['mabuucuc'];
                    $buucuc->tenbuucuc = $row['tenbuucuc'];
                    $buucuc->donvi_id = DB::table('donvis')->where('madonvi', $row['madonvi'])->value('id');
                    $buucuc->save();
                    //donvi::firstOrCreate($row);
                }
            });
        });
        return redirect('/buucuc');
    }

}
