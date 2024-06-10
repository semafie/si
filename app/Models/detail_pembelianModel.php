<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pembelianModel extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian';

    protected $fillable = [
        'id_obat',
        'nama_obat',
        'harga_obat',
        'jumlah_stok',
        'jenis',
        'sub_total',
        'id_pembelian',
        'status'
    ];

    public function pasien()
    {
        return $this->belongsTo(pembelianModel::class, 'id_pembelian');
    }
        

}
