<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapportdoyenne extends Model
{
    protected $fillable = ['designation', 'annee', 'lienfichier', 'envoyer_par', 'doyenne_id','dateenvoi'];
    public function doyenne()
    {
        return $this->belongsTo(Doyenne::class);
    }
}
