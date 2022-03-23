<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index(){
        $data['result'] = \App\Models\Golongan::all();
        return view('golongan/index')->with($data);
    }

    public function create(){
        return view('golongan.form');
    }

    public function store(Request $request){

        $rules =[
            'nama_golongan' => 'required',
            'gaji_golongan' => 'required'
        ];

        $this->validate($request,$rules);

        $input = $request->all();
        $status = \App\Models\Golongan::create($input);

        if ($status) return redirect('/golongan')->with('success','Data berhasil ditambahkan');
        else return redirect('/golongan')->with('error','Data gagal ditambahkan');
    }

    public function edit($id){
        $data['result'] = \App\Models\Golongan::where('id',$id)->first();
        return view('golongan/form')->with($data);
    }

    public function update(Request $request,$id){
        $rules = [
            'nama_golongan' => 'required',
            'gaji_golongan' => 'required'
        ];
        $this->validate($request,$rules);

        $input = $request->all();
        $result = \App\Models\Golongan::where('id',$id)-first();
        $status = $result->update($input);

        if ($status) return redirect('/golongan')->with('success','Data berhasil diubah');
        else return redirect('/golongan')->with('error','Data gagal diubah');
    }

    public function destroy(){
        $result = \App\Models\Golongan::where('id',$id)->first();
        $status = $result->delete();

        if ($status) return redirect('/golongan')->with('success','Data berhasil dihapus');
        else return redirect('/golongan')->with('error','Data gagal dihapus');
    }
}
