<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/22 0022
 * Time: 下午 2:37
 */
namespace  App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Repositories\StockpileRepository;
use App\Repositories\UserRepository;

/**
 * author:卓金鑫
 * Class StockpileContrller
 * @package App\Http\Controllers\Api
 */
class StockpileController extends Controller{
    protected $stockpileRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(StockpileRepository $stockpileRepository)
    {
        $this->middleware('auth:api');
        $this->stockpileRepository=$stockpileRepository;
    }

    public function getinfo(){
        if(\Auth::user()['duty']){
            $res=$this->stockpileRepository->all();
            return $this->dataEncode($res);
        }
        return $this->dataEncode('',200,500,'Unauthenticated');
    }


    }