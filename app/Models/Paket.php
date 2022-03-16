<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $guarded = ['id', 'crated_at', 'updated_at'];
    protected $keyType = 'string';

    public function detailTransaksi(){
        return $this->belongsTo('App\DetailTransaksi');
    }
}
