<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Good.
 *
 * @package namespace App\Models;
 */
class Good extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='goods';
    protected $fillable = [
        'id',
        'user_id',
        'price',
        'name',
        'spec',
        'remarks'
    ];

    public static function getAllItem(){
        return Good::select(
            'users.name as user_name',
            'goods.*'
        )
            ->join('users','goods.user_id','=','users.id')
            ->get();
    }

}
