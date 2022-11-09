<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'thumbnail',
        'price',
        'description',
        'inventory',
        'pack',
        'weight',
        'product_slug',
        'is_actived',
        'planting_methods',
        'farm_product_type_id',
        'express_id',
        'scale_id',
        'unit_id',
        'farmer_id'
    ];
    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id');
    }
    public function farmProductType()
    {
        return $this->belongsTo(FarmProductType::class, 'farm_product_type_id');
    }
    public function scale()
    {
        return $this->belongsTo(Scale::class, 'scale_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}