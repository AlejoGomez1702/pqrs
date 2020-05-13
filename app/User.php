<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasRoles, HasMediaTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identification_card', 'names', 'surnames', 'email', 'password', 'cellphone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Permite editar la notificación de reseteo de contraseña de un usuario.
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notifications\CustomResetPasswordNotification($token));
    }

    /**
     * Relación con dependencia.
     */
    public function dependence()
    {
        return $this->belongsTo('App\Dependence');
    }

    /**
     * Un usuario puede tener muchas peticiones.
     */
    public function requests()
    {
        return $this->belongsToMany('App\Request');
    }

}
