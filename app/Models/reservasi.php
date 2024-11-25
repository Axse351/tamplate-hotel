<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'tbl_reservasi';
    protected $primaryKey = 'id_reservasi';

    // Menentukan kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'tgl_reservasi',
        'nm_customer',
        'kd_kamar',
        'jumlah',
        'total',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kd_kamar', 'kd_kamar');
    }
    public $timestamps = true;
}
