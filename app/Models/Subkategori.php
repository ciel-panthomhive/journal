<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkategori extends Model
{
    use HasFactory;

    protected $table = 'subkategori';

    protected $fillable = ['id', 'subkategories', 'id_kategori'];

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function artikelsubkategori()
    {
        return $this->hasMany(Subkategori::class, 'id_subkategori', 'id');
    }
}
