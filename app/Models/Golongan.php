<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    protected $table = 'table_golongan';

    protected $fillable = [
        'nama_golongan',
        'gaji_golongan'
    ];
}
