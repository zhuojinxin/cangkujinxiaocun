<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Warehouse.
 *
 * @package namespace App\Models;
 */
class Warehouse extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='warehouses';
    protected $fillable = [
        'name',
        'remarks'
    ];
}
