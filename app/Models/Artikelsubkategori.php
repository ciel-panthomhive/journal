<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikelsubkategori extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'artikelsubkategori';

    protected $fillable = ['id', 'id_artikel', 'id_subkategori'];


    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id');
    }

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class, 'id_subkategori', 'id');
    }
}
