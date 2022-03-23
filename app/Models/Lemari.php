<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lemari extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_lemari'

    ];
    public function barang()
    {
        return $this->hasMany(Barang::class, 'lemari_id', 'id');
    }
}
