<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmissionRadioMaria extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'date_emission',
        'paroisse_id',
        'fichier_audio',
        'statut',
        'nombre_ecoutes',
    ];

    protected $casts = [
        'date_emission' => 'date',
        'nombre_ecoutes' => 'integer',
    ];

    public function paroisse()
    {
        return $this->belongsTo(Paroisse::class);
    }
}
