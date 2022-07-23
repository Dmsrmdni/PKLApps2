<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    public $fillable = ['kode_mata_pelajaran', 'nama_mata_pelajaran', 'semester','jurusan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)

    public $timestamps = true;

}
