<?php

namespace App\Presenters;

use App\Transformers\RuchukuTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RuchukuPresenter.
 *
 * @package namespace App\Presenters;
 */
class RuchukuPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RuchukuTransformer();
    }
}
