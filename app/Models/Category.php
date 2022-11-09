<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'thumbnail',
        'category_slug',
        'is_actived',
        'farmer_id',
        ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function farmer()
    {
        return $this->belongsTo(Farmer::class,'farmer_id');
    }

}
