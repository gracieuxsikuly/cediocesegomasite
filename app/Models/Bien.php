<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $fillable = [
        'categorie_bien_id',
        'designation',
        'reference',
        'description',
        'quantite',
        'prix_unitaire',
        'etat',
        'localisation',
        'proprietaire_type',
        'doyenne_id',
        'paroisse_id',
        'date_acquisition',
        'valeur_estimee',
    ];

    protected $casts = [
        'date_acquisition' => 'date',
        'prix_unitaire' => 'decimal:2',
        'valeur_estimee' => 'decimal:2',
    ];

    public function categorie()
    {
        return $this->belongsTo(CategorieBien::class, 'categorie_bien_id');
    }

    public function doyenne()
    {
        return $this->belongsTo(Doyenne::class);
    }

    public function paroisse()
    {
        return $this->belongsTo(Paroisse::class);
    }

    public function getProprietaireLabelAttribute(): string
    {
        return match ($this->proprietaire_type) {
            'doyenne' => $this->doyenne->designation ?? 'Doyenne non definie',
            'paroisse' => $this->paroisse->designation ?? 'Paroisse non definie',
            default => 'Bureau diocesan',
        };
    }

    public function getPrixTotalAttribute(): float
    {
        return (float) $this->quantite * (float) $this->prix_unitaire;
    }
}
