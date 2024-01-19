<?php

namespace App\Http\Controllers;

use App\DTO\Plan\FilterPlan;
use App\Services\PlanService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlanController extends Controller
{
    public function __construct(private PlanService $planService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $plans = $this->planService->getPaginate(new FilterPlan(
            filter: $request->filter,
            page: $request->page,
            totalPerPage: $request->total_per_page
        ));

        return Inertia::render('Plan/Index', ['plans' => $plans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
