<?php

namespace App\Repositories;

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
    public function __construct(public  Plan $plan)
    {

    }


    public function getAll(): Collection
    {
        return $this->plan::all();
    }

    public function getPaginate(string $filter = '', int $page = 1, int $totalPerPage = 15): LengthAwarePaginator
    {
        $plansPaginated = $this->plan::select(['name','price','url AS url-plan'])
                            ->paginate($totalPerPage, ['*'], 'page', $page);

        return $plansPaginated;

    }
}
