<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Query\OrExpr;

class Express extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function farmers()
    {
        return $this->hasMany(Farmer::class);
    }
}
