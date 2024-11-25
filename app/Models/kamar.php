<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tbl_kamar';

    // Primary key dari tabel
    protected $primaryKey = 'id_kamar';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'kd_kamar',
        'no_kamar',
        'jenis',
        'fasilitas',
        'harga',
        'stok',
        'foto',
    ];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'kd_kamar', 'kd_kamar');
    }

    // Timestamps
    public $timestamps = true;
}
