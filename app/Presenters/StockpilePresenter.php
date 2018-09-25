<?php

namespace App\Presenters;

use App\Transformers\StockpileTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StockpilePresenter.
 *
 * @package namespace App\Presenters;
 */
class StockpilePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StockpileTransformer();
    }
}
