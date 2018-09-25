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






}
