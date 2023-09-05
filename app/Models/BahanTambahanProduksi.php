<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanTambahanProduksi extends Model
{
    use HasFactory;

    protected $table = 'bahan_tambahan_produksi';

    protected $guarded = ['id'];
}
