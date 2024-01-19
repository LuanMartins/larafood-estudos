<?php

namespace App\DTO\Plan;

class FilterPlan
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(
        public readonly ?string $filter = '',
        public readonly ?int $page = 1,
        public readonly ?int $totalPerPage
    )
    {

    }
}
