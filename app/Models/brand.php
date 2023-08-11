<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'brand_name',
        'brand_image'

    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}