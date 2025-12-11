<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // checar rol simple
    public function hasRole(string $roleName): bool
    {
        return isset($this->role) && Str::lower($this->role->name) === Str::lower($roleName);
    }

    // checar permiso vía rol
    public function hasPermission(string $permissionName): bool
    {
        if (!$this->role) return false;
        return $this->role->permissions->contains(fn($p) => Str::lower($p->name) === Str::lower($permissionName));
    }
}

