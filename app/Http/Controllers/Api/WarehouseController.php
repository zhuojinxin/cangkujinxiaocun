<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/22 0022
 * Time: 下午 2:37
 */
namespace  App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\goodCreateRequest;
use App\Repositories\UserRepository;
use App\Repositories\WarehouseRepository;

/**
 * Class WarehouseController
 * @package App\Http\Controllers\Api
 * Author: 卓金鑫
 */
class WarehouseController extends Controller{
    protected $warehouseRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->middleware('auth:api');
        $this->warehouseRepository=$warehouseRepository;
    }

    public function getinfo(){
        if(\Auth::user()['duty']){
            $res=$this->warehouseRepository->all();
            return $this->dataEncode($res);
        }
        return $this->dataEncode('',200,500,'Unauthenticated');
    }

    public function create(goodCreateRequest $request)
    {
        $res=$this->warehouseRepository->creeatwarehouse($request->all());
        return $this->dataEncode($res);
    }

    }