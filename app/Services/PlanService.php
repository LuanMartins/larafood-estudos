<?php

namespace App\Services;

use App\DTO\Plan\FilterPlan;
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


    public function getPaginate(FilterPlan $filterPlanDto): LengthAwarePaginator
    {

        return $this->planRepository->getPaginate($filterPlanDto);
    }
}
