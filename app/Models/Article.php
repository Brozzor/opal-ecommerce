<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table="articles";

    protected $fillable = [
        'id', 'name', 'description', 'color','genre','brand','price','qty','imgLink'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
