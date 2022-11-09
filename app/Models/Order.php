<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'delivery_date',
        'note',
        'totals',
        'profit',
        'reason_cancel',
        'user_id',
        'status_id',
        'express_id'
        ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function express()
    {
        return $this->belongsTo(Express::class, 'express_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function contract()
    {
        return $this->hasOne(Contract::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
}
