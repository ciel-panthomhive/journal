<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $fillable = ['id', 'judul', 'thumb', 'isi', 'id_user', 'id_status', 'Keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function artikelstatus()
    {
        return $this->hasMany(Artikelstatus::class, 'id_artikel', 'id');
    }

    public function artikelsubkategori()
    {
        return $this->hasMany(Artikelsubkategori::class, 'id_artikel', 'id');
    }
}
