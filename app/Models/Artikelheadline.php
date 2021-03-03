<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikelheadline extends Model
{
    use HasFactory;
    protected $table = 'artikelheadline';

    protected $fillable = ['id', 'id_artikel', 'id_headline'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id');
    }

    public function headline()
    {
        return $this->belongsTo(Headline::class, 'id_headline', 'id');
    }
}
