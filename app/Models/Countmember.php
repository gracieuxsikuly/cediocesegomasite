<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countmember extends Model
{
    protected $fillable = ['count_croisillons', 'count_feunouveau', 'count_cadets', 'count_equap', 'annee'];
}
