<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * Una petición pertenece a una categoría.
     */
    // public function category()
    // {
    //     return $this->belongsTo('App\Category');
    // }

    /**
     * Una petición se hace en una dependencia.
     */
    public function dependence()
    {
        return $this->belongsTo('App\Dependence');
    }

    /**
     * Una petición involucra muchos usuarios.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
