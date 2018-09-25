<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface WarehouseRepository.
 *
 * @package namespace App\Repositories;
 */
interface WarehouseRepository extends BaseRepositoryInterface
{
    //
    public function creeatwarehouse($request);
}
