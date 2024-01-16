<?php

namespace App\Repositories;

use App\DTO\Plan\CreatePlan;
use App\DTO\Plan\EditPlan;
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

    public function getPaginate(array $request = []): LengthAwarePaginator
    {
        $filter = array_key_exists('filter',$request) ? (string) $request['filter'] : '';
        $page = array_key_exists('page',$request) ? (int) $request['page'] : 1;
        $totalPerPage = array_key_exists('totalPerPage', $request) ? (int) $request['totalPerPage'] : 15;

        $plansPaginated = $this->plan::select(['name','price','url AS url-plan'])
                            ->where('name','LIKE', "%{$filter}%")
                            //->orWhere('url','LIKE', "%{$filter}%")
                            //->orWhere('price', $filter)
                            //->dd();
                            ->paginate($totalPerPage, ['*'], 'page', $page);

        return $plansPaginated;

    }

    public function findById(int $id): ?object
    {
        return $this->plan->find($id);
    }

    public function createNew(CreatePlan $dto): ?bool
    {
        return $this->plan->create($dto);
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
