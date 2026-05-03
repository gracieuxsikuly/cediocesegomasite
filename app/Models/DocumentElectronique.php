<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentElectronique extends Model
{
    protected $table = 'documents_electroniques';

    protected $fillable = [
        'nom_fichier',
        'motif',
        'type_document',
        'proprietaire_type',
        'doyenne_id',
        'paroisse_id',
        'date_document',
        'fichier',
        'created_by',
    ];

    protected $casts = [
        'date_document' => 'date',
    ];

    public function doyenne()
    {
        return $this->belongsTo(Doyenne::class);
    }

    public function paroisse()
    {
        return $this->belongsTo(Paroisse::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getProprietaireLabelAttribute(): string
    {
        return match ($this->proprietaire_type) {
            'doyenne' => $this->doyenne->designation ?? 'Doyenne non definie',
            'paroisse' => $this->paroisse->designation ?? 'Paroisse non definie',
            default => 'Bureau diocesan',
        };
    }
}
