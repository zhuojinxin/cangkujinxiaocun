<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Code;

/**
 * Class CodeTransformer.
 *
 * @package namespace App\Transformers;
 */
class CodeTransformer extends TransformerAbstract
{
    /**
     * Transform the Code entity.
     *
     * @param \App\Models\Code $model
     *
     * @return array
     */
    public function transform(Code $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
