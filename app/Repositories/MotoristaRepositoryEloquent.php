<?php

namespace Multitest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Multitest\Repositories\MotoristaRepository;
use Multitest\Entities\Motorista;

/**
 * Class MotoristaRepositoryEloquent
 * @package namespace Multitest\Repositories;
 */
class MotoristaRepositoryEloquent extends BaseRepository implements MotoristaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Motorista::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
