<?php

namespace Multitest\Presenters;

use Multitest\Transformers\MotoristaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MotoristaPresenter
 *
 * @package namespace Multitest\Presenters;
 */
class MotoristaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MotoristaTransformer();
    }
}
