<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use phpseclib\System\SSH\Agent\Identity;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Models;
 */
class User extends Model implements Transformable
{
    use TransformableTrait,Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = [
        'name',
        'duty',
        'identitycard',
        'phone',
        'email',
        'gender',
        'birthdata',

    ];
    public $casts=[
        'duty'=>'int'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
