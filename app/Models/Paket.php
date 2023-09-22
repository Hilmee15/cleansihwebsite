<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "pakets";

    public function outlets()
    {
        return $this->belongsToMany(Outlet::class);
    }

    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class);
    }
}
