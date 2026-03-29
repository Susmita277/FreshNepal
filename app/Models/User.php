<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'vendor') {
            return $this->role === 'vendor';
        }
        
        if ($panel->getId() === 'admin') {
            return $this->role === 'admin';
        }
        
        
        return false;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'user_id');
    }


    public function isVendor()
    {
        return $this->role === 'vendor';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}