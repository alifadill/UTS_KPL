<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(){
        $data['result'] = \App\Models\Karyawan::all();
        return view('karyawan/index')->with($data);
    }

    public function create(){
        return view('karyawan.form');
    }

    public function store(Request $request){

        $rules =[
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'id_golongan' => 'required'
        ];

        $this->validate($request,$rules);

        $input = $request->all();
        $status = \App\Models\Karyawan::create($input);

        if ($status) return redirect('/karyawan')->with('success','Data berhasil ditambahkan');
        else return redirect('/karyawan')->with('error','Data gagal ditambahkan');
    }

    public function edit($id){
        $data['result'] = \App\Models\Karyawan::where('id',$id)->first();
        return view('karyawan/form')->with($data);
    }

    public function update(Request $request,$id){
        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'id_golongan' => 'required'
        ];
        $this->validate($request,$rules);

        $input = $request->all();
        $result = \App\Models\Karyawan::where('id',$id)-first();
        $status = $result->update($input);

        if ($status) return redirect('/karyawan')->with('success','Data berhasil diubah');
        else return redirect('/karyawan')->with('error','Data gagal diubah');
    }

    public function destroy(){
        $result = \App\Models\Karyawan::where('id',$id)->first();
        $status = $result->delete();

        if ($status) return redirect('/karyawan')->with('success','Data berhasil dihapus');
        else return redirect('/karyawan')->with('error','Data gagal dihapus');
    }
}
