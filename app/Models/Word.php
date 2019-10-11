<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['name', 'tip_phrase', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie', 'categorie_id');
    }
}
