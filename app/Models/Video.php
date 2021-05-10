<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video';

    protected $fillable = ['id', 'nama', 'description', 'url', 'thumbnail', 'show_headline', 'videoId', 'publishTime'];

    public $timestamps = false;
}
