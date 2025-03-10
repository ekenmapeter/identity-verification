<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'verify';

    // Specify the fillable fields (optional but recommended)
    protected $fillable = [
        'first_name',
        'last_name',
        'front_image',
        'back_image',
        'selfie_image',
    ];
}
