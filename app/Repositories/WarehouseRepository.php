<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface WarehouseRepository.
 *
 * @package namespace App\Repositories;
 */
interface WarehouseRepository extends RepositoryInterface
{
    //
    public function creeatwarehouse($request);
}
