<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;
    // campos que contie esta tabla
    protected $fillable = [
        'name', 'price', 'quantity', 'status'
    ];

    // definir la relacion la tabla article con la tabla users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
