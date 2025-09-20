<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activiteprogramme extends Model
{
    protected $fillable = ['titre', 'description', 'dateactivite', 'emplacement', 'typeactivite',
     'image1', 'image2', 'image3', 'statut', 'doyenne_id', 'paroisse_id','slug'];
}
