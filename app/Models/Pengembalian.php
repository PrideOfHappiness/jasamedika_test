<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $primaryKey = 'kembaliID';
    public $incrementing = false;
    protected $fillable = [
        'kembaliID',
        'pinjamID', 
        'mobilID', 
        'userID',
        'lamaHariPinjam', 
        'totalBayar', 
        'status',
        'waktuPengembalian', 
    ];

    public function pinjamID(){
        return $this->belongsTo(Pinjam::class, 'pinjamID', 'pinjamID');
    }
    public function mobilID(){
        return $this->belongsTo(Mobil::class, 'mobilID', 'nomorPlat');
    }

    public function pinjams(){
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
