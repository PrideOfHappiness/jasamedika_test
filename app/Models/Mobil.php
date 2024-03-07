<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';
    protected $primaryKey = 'nomorPlat';
    public $incrementing = false;
    protected $fillable = [
        'nomorPlat', 
        'mobilID', 
        'mesin',
        'model',
        'jenis_bodi', 
        'kapasitasOrang', 
        'transmisi',
        'harga_perHari', 
        'status',
        'namaFileFoto', 
    ];

    public function getMobil(){
        return $this->belongsTo(merkMobil::class, 'mobilID', 'merkID');
    }

    public function pinjams(){
        return $this->hasMany(Pinjam::class, 'mobilID', 'pinjamID');
    }
}
