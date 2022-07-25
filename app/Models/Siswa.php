<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $fillable = ['nis', 'nama_siswa', 'alamat_siswa', 'tanggal_lahir'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)

    public $timestamps = true;

    public function wali()
    {
        // data dari model 'Siswa' bisa memiliki 1 data
        // dari model 'Wali' melalui id_siswa
        return $this->hasOne(Wali::class, 'id_siswa');
    }
}
