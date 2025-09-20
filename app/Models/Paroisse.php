<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paroisse extends Model
{
    protected $fillable = ['designation', 'localisation', 'longitude', 'latitude', 'responsable', 'fonction', 
    'contact', 'nombreaproximatifmembre', 'doyenne_id'];
     public function activitepparoisse(){
        $this->hasMany(Activiteprogramme::class);
    }
    public function doyenne(){
        return $this->belongsTo(Doyenne::class,'doyenne_id');
    }
}
