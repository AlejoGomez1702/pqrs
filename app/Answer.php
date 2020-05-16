<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Answer extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * Una respuesta pertenece a una PQRS.
     */
    public function request()
    {
        return $this->belongsTo('App\Request');
    }


}
