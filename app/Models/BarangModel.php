<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'nama_barang',
        'id_klasifikasi',
        'stok',
        'harga',
        'foto_barang',
    ];

    public function klasifikasi()
    {
        return $this->belongsTo(KlasifikasiModel::class, 'id_klasifikasi', 'id_klasifikasi');
    }
}