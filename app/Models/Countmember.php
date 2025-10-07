<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countmember extends Model
{
    protected $fillable = ['count-croisillons', 'count-feunouveau', 'count-cadets', 'count-equap', 'annee'];
}
