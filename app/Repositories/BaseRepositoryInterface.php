<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14 0014
 * Time: 下午 11:44
 */
namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * 定义基本repository接口
 * Interface BaseRepositoryInterface
 * @package App\Repositories
 */
interface BaseRepositoryInterface extends RepositoryInterface,RepositoryCriteriaInterface{

}