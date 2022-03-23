<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable =[
        'lemari_id',
        'nama_barang',
        'jenis_barang'


    ];
    public function lemari()
    {
        return $this->hasOne(Lemari::class, 'id', 'lemari_id');
    }
}
