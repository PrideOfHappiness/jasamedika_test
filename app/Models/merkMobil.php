<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merkMobil extends Model
{
    use HasFactory;
    protected $table="merk_mobil";
    protected $primary="merkID";
    public $incrementing = false;
    protected $fillable = ['merkID', 'nama'];

    public function mobils(){
        return $this->hasMany(Mobil::class, 'mobilID', 'nomorPlat');
    }

}
