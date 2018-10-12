<?php

namespace App\Presenters;

use App\Transformers\CodeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CodePresenter.
 *
 * @package namespace App\Presenters;
 */
class CodePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CodeTransformer();
    }
}
