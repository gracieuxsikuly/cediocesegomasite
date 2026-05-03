<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieBien extends Model
{
    protected $table = 'categories_biens';

    protected $fillable = ['designation', 'description'];

    public function biens()
    {
        return $this->hasMany(Bien::class);
    }
}
