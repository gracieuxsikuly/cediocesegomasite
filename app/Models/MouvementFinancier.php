<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MouvementFinancier extends Model
{
    protected $table = 'mouvements_financiers';

    protected $fillable = [
        'type',
        'designation',
        'motif',
        'montant',
        'date_operation',
        'mode_paiement',
        'reference',
        'piece_jointe',
        'created_by',
    ];

    protected $casts = [
        'date_operation' => 'date',
        'montant' => 'decimal:2',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
