<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Compte extends Model
{
    use SoftDeletes;

    protected $fillable = ['rib','solde','user_id']; // client_id → user_id

    // Un compte appartient à un utilisateur (client)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}