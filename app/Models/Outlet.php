<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'outlet';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $guarded = ['id', 'crated_at', 'updated_at'];
    protected $keyType = 'string';
}
