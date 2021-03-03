<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikelstatus extends Model
{
    use HasFactory;
    protected $table = 'artikelstatus';

    protected $fillable = ['id', 'id_artikel', 'id_status'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }
}
