<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmProductType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'thumbnail', 'product_type_slug'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}