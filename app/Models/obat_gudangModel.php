<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat_gudangModel extends Model
{
    use HasFactory;

    protected $table = 'obat_gudang';

    protected $fillable = [
        'nama_obat',
        'harga_obat',
        'jumlah_stok',
        'jenis'
    ];
}
