<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordBahan extends Model
{
    use HasFactory;

    protected $table = 'record_bahan';

    protected $guarded = ['id'];
}
