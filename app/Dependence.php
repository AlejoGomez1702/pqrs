<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependence extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * Una dependencia tiene muchas peticiones.
     */
    public function requests()
    {
        return $this->hasMany('App\Request');
    }

}
