<?php

namespace App\Services;

use App\Repositories\PlanRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PlanService
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(private PlanRepository $planRepository)
    {

    }


    public function getPaginate(string $filter = '', int $page = 1, int $totalPerPage = 15): LengthAwarePaginator
    {
        $plansPaginated = $this->planRepository->getPaginate(
            filter: $filter,
            page: $page,
            totalPerPage:$totalPerPage
        );

        return $plansPaginated;
    }
}
