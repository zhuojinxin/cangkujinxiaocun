<?php

namespace App\Presenters;

use App\Transformers\WarehouseTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WarehousePresenter.
 *
 * @package namespace App\Presenters;
 */
class WarehousePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WarehouseTransformer();
    }
}
