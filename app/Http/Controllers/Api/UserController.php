<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/22 0022
 * Time: 下午 2:37
 */
namespace  App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

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
     * @param mixed $userRepository
     */
    public function getinfo(){
$user=$this->userRepository->find(\Auth::id());
return $user;
    }
}