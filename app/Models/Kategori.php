<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = ['kategories'];

    public $timestamps = false;

    public function subkategori()
    {
        return $this->hasMany(Subkategori::class, 'id_kategori', 'id');
    }
}
