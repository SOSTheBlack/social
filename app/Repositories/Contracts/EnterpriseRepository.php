<?php

namespace App\Repositories\Contracts;

/**
 * Interface EnterpriseRepository.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface EnterpriseRepository extends RepositoryContract
{
    /**
     * @const string
     */
    public const SUFFIX_ENTERPRISE = 'LTDA';

    /**
     * Create a new enterprise.
     *
     * @param  array  $user
     *
     * @return array
     */
    public function createByUser(array $user): array;
}
