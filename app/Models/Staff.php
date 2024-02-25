<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public $table = "staff";

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'phone'
    ];
}
