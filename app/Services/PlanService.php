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


    public function getPaginate(array $request = []): LengthAwarePaginator
    {

        return $this->planRepository->getPaginate($request);
    }
}
