<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoVideo extends Model
{
    protected $fillable = ['designation', 'liens', 'doyenne_id', 'paroisse_id'];
    public function doyenne()
    {
        return $this->belongsTo(Doyenne::class);
    }
    public function paroisse()
    {
        return $this->belongsTo(Paroisse::class);
    }
}
