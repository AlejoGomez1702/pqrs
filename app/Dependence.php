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

    /**
     * Una dependencia tiene muchos usuarios.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Determina si una dependencia tiene lider o no.
     */
    public function getLeader()
    {
        $users = $this->users;

        foreach ($users as $user) 
        {            
            $roles = $user->roles->pluck('name');
            foreach ($roles as $role)
            {
                if($role == 'leader')
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

}
