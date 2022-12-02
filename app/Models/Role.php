<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    // public function userss()
    // {
    //     return $this->belongsToMany(User::class, 'role_users');
    // }


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
