<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/22 0022
 * Time: 下午 2:37
 */
namespace  App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\ruchukuCreateRequest;
use App\Repositories\RuchukuRepository;
use App\Repositories\StockpileRepository;
use App\Repositories\UserRepository;

/**
 * author:卓金鑫
 * Class StockpileContrller
 * @package App\Http\Controllers\Api
 */
class RuchukuController extends Controller{
    protected $ruchukuRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(RuchukuRepository $ruchukuRepository)
    {
        $this->middleware('auth:api');
        $this->ruchukuRepository=$ruchukuRepository;
    }

    public function getinfo(){
        if(\Auth::user()['duty']){
            $res=$this->ruchukuRepository->all();
            return $this->dataEncode($res);
        }
        return $this->dataEncode('',200,500,'Unauthenticated');
    }

    public function ruku(ruchukuCreateRequest $request){
        if(\Auth::user()['duty']){
            $res=$this->ruchukuRepository->ruku($request->all(),\Auth::id());
            return $this->dataEncode($res);
        }
        return $this->dataEncode('',200,500,'Unauthenticated');
    }

    }