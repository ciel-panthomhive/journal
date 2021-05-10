<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikelheadline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'artikelheadline';

    protected $primaryKey = 'id_artikel';

    protected $fillable = ['id_artikel', 'id_headline'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id');
    }

    public function headline()
    {
        return $this->belongsTo(Headline::class, 'id_headline', 'id');
    }
}
