<?php

use App\DTO\Plan\FilterPlan;
use App\Models\Plan;
use App\Services\PlanService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

beforeEach(fn () => $this->service = app(PlanService::class));


describe('service - filters get paginate', function(){


    test('without filter,page and totalPerPage', function(){
        Plan::factory(15)->create();

        $response = $this->service->getPaginate(
                    new FilterPlan()
                );
        expect($response)->toBeInstanceOf(LengthAwarePaginator::class);
        expect($response->currentPage())->toBe(1);
        expect($response->lastPage())->toBe(1);
        expect($response->items())->toBeArray();
        expect(count($response->items()))->toBe(15);
        expect($response->total())->toBe(15);
        expect($response->perPage())->toBe(15);



    });

    test('without filter, but with page ', function(){
        Plan::factory(30)->create();

        $response = $this->service->getPaginate(
                    new FilterPlan(
                        page: 2
                    )
                );
        expect($response)->toBeInstanceOf(LengthAwarePaginator::class);
        expect($response->currentPage())->toBe(2);
        expect($response->lastPage())->toBe(2);
        expect($response->items())->toBeArray();
        expect(count($response->items()))->toBe(15);
        expect($response->total())->toBe(30);
        expect($response->perPage())->toBe(15);



    });

    describe('custom quantity per page', function(){

        test('without filter,page but with totalPerPage equals 30', function(){
            Plan::factory(30)->create();

            $response = $this->service->getPaginate(
                        new FilterPlan(
                            totalPerPage: 30
                        )
                    );
            expect($response)->toBeInstanceOf(LengthAwarePaginator::class);
            expect($response->currentPage())->toBe(1);
            expect($response->lastPage())->toBe(1);
            expect($response->items())->toBeArray();
            expect(count($response->items()))->toBe(30);
            expect($response->total())->toBe(30);
            expect($response->perPage())->toBe(30);



        });


        test('without filter,page but with totalPerPage equals 15', function(){
            Plan::factory(15)->create();

            $response = $this->service->getPaginate(
                        new FilterPlan(
                            totalPerPage: 15
                        )
                    );
            expect($response)->toBeInstanceOf(LengthAwarePaginator::class);
            expect($response->currentPage())->toBe(1);
            expect($response->lastPage())->toBe(1);
            expect($response->items())->toBeArray();
            expect(count($response->items()))->toBe(15);
            expect($response->total())->toBe(15);
            expect($response->perPage())->toBe(15);



        });

        test('without filter,page but with totalPerPage equals 45', function(){
            Plan::factory(45)->create();

            $response = $this->service->getPaginate(
                        new FilterPlan(
                            totalPerPage: 45
                        )
                    );
            expect($response)->toBeInstanceOf(LengthAwarePaginator::class);
            expect($response->currentPage())->toBe(1);
            expect($response->lastPage())->toBe(1);
            expect($response->items())->toBeArray();
            expect(count($response->items()))->toBe(45);
            expect($response->total())->toBe(45);
            expect($response->perPage())->toBe(45);



        });

        test('without filter,page but with totalPerPage equals 100', function(){
            Plan::factory(100)->create();

            $response = $this->service->getPaginate(
                        new FilterPlan(
                            totalPerPage: 100
                        )
                    );
            expect($response)->toBeInstanceOf(LengthAwarePaginator::class);
            expect($response->currentPage())->toBe(1);
            expect($response->lastPage())->toBe(1);
            expect($response->items())->toBeArray();
            expect(count($response->items()))->toBe(100);
            expect($response->total())->toBe(100);
            expect($response->perPage())->toBe(100);



        });

    });

    test('with filter', function(){
        Plan::factory(15)->create();
        Plan::factory()->create([
            'name' => 'Luan Martins'
        ]);

        $response = $this->service->getPaginate(
                    new FilterPlan(
                        filter: 'Luan Martins'
                    )
                );

        expect($response)->toBeInstanceOf(LengthAwarePaginator::class);
        expect($response->currentPage())->toBe(1);
        expect($response->lastPage())->toBe(1);
        expect($response->items())->toBeArray();
        expect(count($response->items()))->toBe(1);
        expect($response->total())->toBe(1);
        expect($response->perPage())->toBe(15);
    });

});

