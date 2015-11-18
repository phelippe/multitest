<?php

namespace Multitest\Presenters;

use Multitest\Transformers\ClienteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ClientePresenter
 *
 * @package namespace Multitest\Presenters;
 */
class ClientePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClienteTransformer();
    }
}
