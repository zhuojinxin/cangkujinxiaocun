<?php

namespace App\Presenters;

use App\Transformers\GoodTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GoodPresenter.
 *
 * @package namespace App\Presenters;
 */
class GoodPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GoodTransformer();
    }
}
