<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acl extends Model
{
    use HasFactory;

    protected $fillables = [
        'url',
        'name',
        'method',
        'type',
        'is_active'
    ];
}
