<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseRecord extends Model
{
    use HasFactory;

    protected $table = 'warehouse_record';
    protected $guarded = ['id'];
}
