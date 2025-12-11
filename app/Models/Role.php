<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // users with this role
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // permissions attached to this role
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
