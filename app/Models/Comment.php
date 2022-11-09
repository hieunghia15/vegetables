<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'parent_id',
        'commentable_id',
        'commentable_type',
        'user_id',
        'product_id'
        ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(User::class, 'product_id');
    }
    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
