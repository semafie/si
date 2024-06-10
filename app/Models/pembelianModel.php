<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelianModel extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'tanggal',
        'jam',
        'total_harga',
        'status',
        'jenis',
    ];

    
}
