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

    public function findById(string $id): ?object
    {
        return $this->planRepository->findById($id);

    }

    public function create(CreatePlan $create): ?object
    {
        return $this->planRepository->createNew($create);
    }

    public function update(EditPlan $edit): ?object
    {
        return $this->planRepository->update($edit);
    }

    public function delete(string $id): ?bool
    {
        return $this->planRepository->delete($id);
    }
}
