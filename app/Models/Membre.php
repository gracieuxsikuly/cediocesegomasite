<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    protected $fillable = ['nomcomplet', 'section', 'sexe', 'photo', 'dateenregistrement', 'paroisse_id', 'photo', 'statut'];
}
