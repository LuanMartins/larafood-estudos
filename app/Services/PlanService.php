<?php

namespace App\Services;

use App\DTO\Plan\CreatePlan;
use App\DTO\Plan\EditPlan;
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

    public function findById(int $id): ?object
    {
        return $this->planRepository->findById($id);

    }


    public function update(EditPlan $edit): ?object
    {
        return $this->planRepository->update($edit);
    }

    public function delete(int $id): ?bool
    {
        return $this->planRepository->delete($id);
    }
}
