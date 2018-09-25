<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Ruchuku;

/**
 * Class RuchukuTransformer.
 *
 * @package namespace App\Transformers;
 */
class RuchukuTransformer extends TransformerAbstract
{
    /**
     * Transform the Ruchuku entity.
     *
     * @param \App\Models\Ruchuku $model
     *
     * @return array
     */
    public function transform(Ruchuku $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
