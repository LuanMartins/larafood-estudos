<?php

namespace App\Http\Controllers;

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
        $totalPerPage = $request->total_per_page ?? 15;
        $page = $request->page ?? 1;
        $filter = $request->filter ?? '';

        $plans = $this->planService->getPaginate(
            filter: $filter,
            page: $page,
            totalPerPage: $totalPerPage
        );

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
