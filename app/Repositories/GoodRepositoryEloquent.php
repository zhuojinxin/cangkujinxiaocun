<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\goodRepository;
use App\Models\Good;
use App\Validators\GoodValidator;

/**
 * Class GoodRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GoodRepositoryEloquent extends BaseRepository implements GoodRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Good::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return GoodValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
