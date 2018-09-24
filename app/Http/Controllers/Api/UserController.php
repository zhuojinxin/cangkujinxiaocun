<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/22 0022
 * Time: 下午 2:37
 */
namespace  App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\getuserinfo;
use App\Http\Requests\userUpdateRequest;
use App\Repositories\UserRepository;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 * Author: 卓金鑫
 */
class UserController extends Controller{
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
$this->middleware('auth:api');
$this->userRepository=$userRepository;
    }

    /**
     *获取用户信息
     * @param mixed $userRepository
     */
    public function getinfo(){
return $this->dataEncode(\Auth::user());
    }

    /**
     * 更新用户信息
     * @param userUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(userUpdateRequest $request)
    {
        $user=$this->userRepository->update($request->all(),\Auth::id());
        return $this->dataEncode($user);
    }

    /**
     * 获取指定用户信息
     * @param getuserinfo $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userinfo(getuserinfo $request)
    {
        $user=$this->userRepository->find($request->get('id'));
        return $this->dataEncode($user);
    }

    }