<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $fillable = ['nis', 'nama_siswa', 'alamat_siswa','tanggal_lahir'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)

    public $timestamps = true;

}
