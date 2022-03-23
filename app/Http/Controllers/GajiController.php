<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index(){
        $data['result'] = \App\Models\Gaji::all();
        return view('gaji/index')->with($data);
    }

    public function create(){
        return view('gaji.form');
    }

    public function store(Request $request){

        $rules =[
            'id_karyawan' => 'required'
        ];

        $this->validate($request,$rules);

        $input = $request->all();
        $status = \App\Models\Gaji::create($input);

        if ($status) return redirect('/gaji')->with('success','Data berhasil ditambahkan');
        else return redirect('/gaji')->with('error','Data gagal ditambahkan');
    }

    public function edit($id){
        $data['result'] = \App\Models\Gaji::where('id',$id)->first();
        return view('gaji/form')->with($data);
    }

    public function update(Request $request,$id){
        $rules = [
            'id_karyawan' => 'required'
        ];
        $this->validate($request,$rules);

        $input = $request->all();
        $result = \App\Models\Gaji::where('id',$id)-first();
        $status = $result->update($input);

        if ($status) return redirect('/gaji')->with('success','Data berhasil diubah');
        else return redirect('/gaji')->with('error','Data gagal diubah');
    }

    public function destroy(){
        $result = \App\Models\Gaji::where('id',$id)->first();
        $status = $result->delete();

        if ($status) return redirect('/gaji')->with('success','Data berhasil dihapus');
        else return redirect('/gaji')->with('error','Data gagal dihapus');
    }
}
