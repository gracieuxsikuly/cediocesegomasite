<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doyenne extends Model
{
    protected $fillable = ['designation', 'localisation', 'responsable', 'nombreaproximatifmembre', 'fonction', 'contact'];
}
