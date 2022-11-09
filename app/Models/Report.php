<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'messege',
        'processing',
        'user_id',
        'farmer_id',
        'type_report_id'
        ];
    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id');
    }
    public function type_report()
    {
        return $this->belongsTo(TypeReport::class, 'type_report_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
