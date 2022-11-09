<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'total',
        'vat',
        'total_value',
        'original_document',
        'customer_id',
        'farmer_id',
        'order_id'
        ];
    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
    public function customer()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class,'order_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
