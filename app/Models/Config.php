<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'table', 'value', 'type_id', 'active'];

    public function type()
    {
        return $this->belongsTo('App\Models\Config\Type', 'type_id');
    }
}
