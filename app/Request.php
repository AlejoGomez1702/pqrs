<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Carbon\Carbon;

class Request extends Model implements HasMedia
{
    use HasMediaTrait;

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

    /**
     * Me retorna el funcionario destino de la pqrs.
     */
    public function getOfficial()
    {
        $users = $this->users;
        foreach ($users as $user) 
        {            
            $roles = $user->roles->pluck('name');
            foreach ($roles as $role)
            {
                if($role == 'official')
                {
                    $data = [
                        'id' => $user->id, 
                        'names' => $user->names,
                        'surnames' => $user->surnames
                    ];

                    return $data;
                }
            }
            // return "{$user->roles->pluck('name')}";
        }

        return null;
    }

    public function getDifferDates()
    {
        $date_created = Carbon::parse($this->maximun_date);
        $now_date = Carbon::now();

        $diff = $date_created->diffInDays($now_date);
        return $diff;
    }

}
