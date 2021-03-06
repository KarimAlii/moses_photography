<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['album_id','filename'];

    public function images(){
        return $this->belongsTo(Album::class,'id');
    }
}
