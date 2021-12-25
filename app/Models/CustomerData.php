<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerData extends Model
{
    use HasFactory;
    public $fillable = [
        'cus_id',
        'first_name',
        'last_name',
        'mobile',
        'email',
        'status',
        'created_at',
    ];
}
