<?php

namespace Multitest\Transformers;

use League\Fractal\TransformerAbstract;
use Multitest\Entities\Motorista;

/**
 * Class MotoristaTransformer
 * @package namespace Multitest\Transformers;
 */
class MotoristaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Motorista entity
     * @param \Motorista $model
     *
     * @return array
     */
    public function transform(Motorista $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
