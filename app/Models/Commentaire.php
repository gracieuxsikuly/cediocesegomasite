<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
   protected $fillable = ['content', 'nom', 'activiteprogramme_id'];
}
