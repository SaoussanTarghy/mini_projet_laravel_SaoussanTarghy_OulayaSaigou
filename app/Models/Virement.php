<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virement extends Model
{
    use HasFactory;

    protected $fillable = [
        'compte_emetteur_id',
        'compte_recepteur_id',
        'montant'
    ];

    // Le compte qui émet le virement
    public function compteEmetteur()
    {
        return $this->belongsTo(Compte::class, 'compte_emetteur_id');
    }

    // Le compte qui reçoit le virement
    public function compteRecepteur()
    {
        return $this->belongsTo(Compte::class, 'compte_recepteur_id');
    }
}