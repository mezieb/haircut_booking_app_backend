<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    // Optionally, define fillable fields if you plan to mass assign any
    protected $fillable = ['status_name'];
}
