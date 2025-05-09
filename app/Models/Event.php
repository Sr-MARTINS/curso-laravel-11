<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use PhpParser\Node\Stmt\Return_;

class Event extends Model
{
    use HasFactory;
    
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];
}
