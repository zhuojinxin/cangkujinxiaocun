<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface GoodRepository.
 *
 * @package namespace App\Repositories;
 */
interface GoodRepository extends BaseRepositoryInterface
{
    //
    public function creeatgood($request,$user_id);
}
