<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // role model defined
    use HasFactory;

    protected $fillable = ['role_name'];

    // Optionally, you can define the relationship back to users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
