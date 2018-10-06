<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Ruchuku.
 *
 * @package namespace App\Models;
 */
class Ruchuku extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * @var string
     */
    protected $table='ruchukus';

    protected $fillable = [
        'name',
        'good_id',
        'warehouse_id',
        'user_id',
        'amount',
        'remarks'
    ];
    public static function getAllItem(){
        return Ruchuku::select(
            'users.name as user_name',
            'warehouses.name as warehouse_name',
            'goods.name as good_name',
            'ruchukus.*'
        )
            ->join('goods','ruchukus.good_id','=','goods.id')
            ->join('warehouses','ruchukus.warehouse_id','=','warehouses.id')
            ->join('users','ruchukus.user_id','=','users.id')
            ->get();
    }
}
