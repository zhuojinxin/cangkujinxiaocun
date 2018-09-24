<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\warehouseRepository;
use App\Models\Warehouse;
use App\Validators\WarehouseValidator;

/**
 * Class WarehouseRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WarehouseRepositoryEloquent extends BaseRepository implements WarehouseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Warehouse::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return WarehouseValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function creeatwarehouse($request){

        if(array_key_exists('id',$request)){
            $res=$this->update($request,$request['id']);
        }
        else
        {
            $res=$this->create($request);
        }
        return $res;

    }
    
}
