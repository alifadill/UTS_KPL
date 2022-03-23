<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    public $primaryKey = 'nik';

    protected $table = 'table_karyawan';

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'id_golongan'
    ];

    public function golongan(){
        return $this->hasOne('\App\Models\Golongan','id','id_golongan');
    }

    public function getNIK(){
        return $this->nik;
    }
    public function getNama(){
        return $this->nama;
    }

}
