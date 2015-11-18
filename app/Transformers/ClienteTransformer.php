<?php

namespace Multitest\Transformers;

use League\Fractal\TransformerAbstract;
use Multitest\Entities\Cliente;

/**
 * Class ClienteTransformer
 * @package namespace Multitest\Transformers;
 */
class ClienteTransformer extends TransformerAbstract
{

    /**
     * Transform the \Cliente entity
     * @param \Cliente $model
     *
     * @return array
     */
    public function transform(Cliente $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
