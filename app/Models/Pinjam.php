<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjam_mobil';
    protected $primaryKey = 'pinjamID';
    public $incrementing = false;
    protected $fillable = [
        'pinjamID', 
        'mobilID', 
        'userID',
        'lamaHariPinjam', 
        'totalBayar', 
        'status',
        'hariPinjam',
        'hariSelesai', 
    ];

    public function mobilIDs(){
        return $this->belongsTo(Mobil::class, 'mobilID', 'nomorPlat');
    }

    public function pinjams(){
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
