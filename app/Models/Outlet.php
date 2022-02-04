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
    protected $keyType = 'string';
}
