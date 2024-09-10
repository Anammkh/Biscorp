<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';

    protected $fillable = [
        'nama','email', 'alamat', 'gambar', 'jabatan_id'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
