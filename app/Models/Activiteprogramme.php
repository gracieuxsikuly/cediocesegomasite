<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activiteprogramme extends Model
{
    protected $fillable = ['titre', 'description', 'dateactivite','start_time', 'end_time', 'emplacement', 'typeactivite',
     'image1', 'image2', 'image3', 'statut', 'doyenne_id', 'paroisse_id','slug'];


     public function doyenne()
     {
        return $this->belongsTo(Doyenne::class,'doyenne_id');
     }
      public function paroisse()
     {
        return $this->belongsTo(Paroisse::class,'paroisse_id');
     }
     public function commentaire(){
        return $this->hasMany(Commentaire::class);
     }
}
