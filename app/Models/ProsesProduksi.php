<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesProduksi extends Model
{
    use HasFactory;

    protected $table = 'proses_produksi';
    protected $guarded = ['id'];
}
