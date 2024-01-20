<?php

namespace App\Repositories;

use App\DTO\Plan\CreatePlan;
use App\DTO\Plan\EditPlan;
use App\DTO\Plan\FilterPlan;
use App\Models\Plan;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PlanRepository
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(public Plan $plan)
    {

    }


    public function getAll(): Collection
    {
        return $this->plan::all();
    }

    public function getPaginate(FilterPlan $filterPlanDto): LengthAwarePaginator
    {


        $plansPaginated = $this->plan::select(['name','price','url AS url-plan'])
                            ->where('name','LIKE', "%{$filterPlanDto->filter}%")
                            //->orWhere('url','LIKE', "%{$filter}%")
                            //->orWhere('price', $filter)
                            //->dd();
                            ->paginate($filterPlanDto->totalPerPage, ['*'], 'page', $filterPlanDto->page);

        return $plansPaginated;

    }

    public function findById(int $id): ?object
    {
        return $this->plan->find($id);
    }

    public function createNew(CreatePlan $dto): ?bool
    {
        return $this->plan->create((array) $dto);
    }

    public function update(EditPlan $dto): ?bool
    {
        if(! $model = $this->findById($dto->id)){
            return null;
        }

        return $model->update((array) $dto);
    }

    public function delete(int $id): ?bool
    {
        if(! $model = $this->findById($id)){
            return null;
        }

        return $model->delete();

    }
}
