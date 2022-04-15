<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
