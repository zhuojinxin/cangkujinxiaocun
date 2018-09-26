<?php

namespace App\Repositories;

use App\Criteria\HasFieldCriteria;
use App\Http\Controllers\Api\GoodController;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ruchukuRepository;
use App\Models\Ruchuku;
use App\Validators\RuchukuValidator;

/**
 * Class RuchukuRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RuchukuRepositoryEloquent extends BaseRepository implements RuchukuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ruchuku::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RuchukuValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function ruku(array $attributes){
        $good=app(StockpileRepository::class)
            ->pushCriteria(new HasFieldCriteria('good_id',$attributes['good_id']))
            ->first();
if($good){

}
    }
}
