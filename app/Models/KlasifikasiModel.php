<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiModel extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi';
    protected $primaryKey = 'id_klasifikasi';
    protected $fillable = ['nama_klasifikasi', 'deskripsi'];

    public function barangs()
    {
        return $this->hasMany(BarangModel::class, 'id_klasifikasi', 'id_klasifikasi');
    }
}