<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Concat;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'avatar', 'tax_code', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'farmer_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}