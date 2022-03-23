<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    protected $table = 'table_gaji';

    protected $fillable = [
        'id_karyawan',
        'potongan',
        'tunjangan'
    ];

    public function karyawan(){
        return $this->hasOne('\App\Models\Karyawan','nik','id_karyawan');
    }

    public function getTunj(){
        return $this->tunjangan;
    }
    public function getTotal(){
        return $this->karyawan->golongan->gaji_golongan + $this->tunjangan - $this->potongan;
    }
}
