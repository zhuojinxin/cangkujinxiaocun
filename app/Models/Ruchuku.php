<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
