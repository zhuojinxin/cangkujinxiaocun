<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories;
 */
interface UserRepository extends BaseRepositoryInterface
{
    //

    public function userinfo();
    public function updateinfo(array $attributes, $id);
}
