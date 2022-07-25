<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;

    // membuat relasi one to one di model
    public function siswa()
    {
        // data dari model 'Wali' bisa dimiliki
        // oleh model 'Siswa' melalui 'id_siswa'
        return $this->belongsTo(Siswa::class,'id_siswa');
    }

    // method menampilkan image(foto)
    public function image()
    {
        if ($this->foto && file_exists(public_path('images/wali/' . $this->foto))) {
            return asset('images/wali/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // mengahupus image(foto) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/wali/' . $this->foto))) {
            return unlink(public_path('images/wali/' . $this->foto));
        }
    }

    public static function boot(){
        parent::boot();

        self::deleting(function ($parameter) {
            // mengecek apakah article masih punya category
            if ($parameter->siswa->count() > 0) {
                $html = 'Guru tidak bisa dihapus karena masih memiliki siswa : ';
                $html .= '<ul>';
                foreach ($parameter->siswa as $data) {
                    $html .= "<li>$data->nama</li>";
                }
                $html .= '</ul>';

                Session::flash("flash_notification", [
                    "level" => "danger",
                    "message" => $html,
                ]);

                return false;
            }
        });
    }
}
