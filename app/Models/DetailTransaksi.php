<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function paket(){
        return $this->hasMany('App\Paket');
    }

    public function transakski(){
        return $this->hasOne('App\Transaksi');
    }

}
