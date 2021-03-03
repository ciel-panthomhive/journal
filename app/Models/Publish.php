<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;

    protected $table = 'publish';

    protected $fillable = ['id', 'id_artikel'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id');
    }
}
