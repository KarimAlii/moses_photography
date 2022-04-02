<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'image_id'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function images(){
        return $this->HasMany(Image::class,'album_id','id');
    }
}
