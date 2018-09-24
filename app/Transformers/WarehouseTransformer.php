<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Warehouse;

/**
 * Class WarehouseTransformer.
 *
 * @package namespace App\Transformers;
 */
class WarehouseTransformer extends TransformerAbstract
{
    /**
     * Transform the Warehouse entity.
     *
     * @param \App\Models\Warehouse $model
     *
     * @return array
     */
    public function transform(Warehouse $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
