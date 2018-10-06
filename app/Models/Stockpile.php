<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Stockpile.
 *
 * @package namespace App\Models;
 */
class Stockpile extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='stockpiles';

    protected $fillable = [
        'good_id',
        'user_id',
        'warehouse_id',
        'amount'
    ];

    public static function getAllItem(){
        return Stockpile::select(
            'goods.name as good_name',
            'users.name as user_name',
            'warehouses.name as warehouses_name',
            'stockpiles.*'
        )
            ->join('warehouses','stockpiles.warehouse_id','=','warehouses.id')
            ->join('users','stockpiles.user_id','=','users.id')
            ->join('goods','stockpiles.good_id','=','goods.id')
            ->get();
    }






}
