<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoVideo extends Model
{
    protected $fillable = ['designation', 'lien', 'doyenne_id', 'paroisse_id'];
}
