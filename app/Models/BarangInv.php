<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangInv extends Model
{
    use HasFactory;
    protected $table = 'baranginv';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['id', 'crated_at', 'updated_at'];
}
