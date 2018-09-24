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
use App\Repositories\GoodRepository;
use App\Repositories\UserRepository;

/**
 * Author: 卓金鑫
 * Class GoodController
 * @package App\Http\Controllers\Api
 */
class GoodController extends Controller{
    protected $goodRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(GoodRepository $goodRepository)
    {
        $this->middleware('auth:api');
        $this->goodRepository=$goodRepository;

    }

    public function getinfo(){
        if(\Auth::user()['duty']){
            $res=$this->goodRepository->all();
            return $this->dataEncode($res);
        }
        return $this->dataEncode('',200,500,'Unauthenticated');
    }

    public function create(goodCreateRequest $request)
    {
        $res=$this->goodRepository->creeatgood($request->all(),\Auth::id());
        return $this->dataEncode($res);
    }

    }