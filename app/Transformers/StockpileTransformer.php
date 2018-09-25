<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Stockpile;

/**
 * Class StockpileTransformer.
 *
 * @package namespace App\Transformers;
 */
class StockpileTransformer extends TransformerAbstract
{
    /**
     * Transform the Stockpile entity.
     *
     * @param \App\Models\Stockpile $model
     *
     * @return array
     */
    public function transform(Stockpile $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
