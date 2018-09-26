<?php

namespace App\Repositories;

use App\Criteria\HasFieldCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GoodRepository;
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

    public function creeatgood($request,$user_id){
        $request['user_id']=$user_id;
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
