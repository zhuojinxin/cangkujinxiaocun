<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RuchukuRepository.
 *
 * @package namespace App\Repositories;
 */
interface RuchukuRepository extends BaseRepositoryInterface
{
    //
    /**
     * 入库操作
     * author：卓金鑫
     * @param array $attributes
     * @return mixed
     */
    public function ruku(array $attributes,$user_id);
    public function chuku(array $attributes,$user_id);

}
