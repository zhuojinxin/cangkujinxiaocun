<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\stockpileRepository;
use App\Models\Stockpile;
use App\Validators\StockpileValidator;

/**
 * Class StockpileRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StockpileRepositoryEloquent extends BaseRepository implements StockpileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Stockpile::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StockpileValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
