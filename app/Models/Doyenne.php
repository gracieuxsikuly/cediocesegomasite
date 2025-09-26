<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doyenne extends Model
{
    protected $fillable = ['designation', 'localisation', 'responsable', 'nombreaproximatifmembre', 'fonction', 'contact'];
    public function activitedoyenne(){
        $this->hasMany(Activiteprogramme::class);
    }
    public function paroisse(){
         $this->hasMany(Paroisse::class);
    }
    public function rapportdoyennes(){
        return $this->hasMany(Rapportdoyenne::class);
    }
}
