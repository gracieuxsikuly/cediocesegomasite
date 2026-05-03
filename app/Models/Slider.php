<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'titre',
        'sous_titre',
        'description',
        'image',
        'bouton_texte',
        'bouton_lien',
        'bouton_secondaire_texte',
        'bouton_secondaire_lien',
        'ordre',
        'statut',
    ];
}
