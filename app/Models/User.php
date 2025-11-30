<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
   protected $fillable = [
        'name',
        'prenom',   // ajouté pour ton mini-projet
        'email',
        'password',
        'role',     // 'admin' ou 'client'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ----------------- Relations -----------------

    // Si tu veux lier un utilisateur à plusieurs clients
    public function clients()
    {
        return $this->hasMany(Client::class, 'user_id'); 
    }

    // Si tu veux lier un utilisateur à plusieurs comptes
    public function comptes()
    {
        return $this->hasMany(Compte::class, 'user_id');
    }

    // ----------------- Helper -----------------

    // Vérifie si l'utilisateur est admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Vérifie si l'utilisateur est client
    public function isClient(): bool
    {
        return $this->role === 'client';
    }
}