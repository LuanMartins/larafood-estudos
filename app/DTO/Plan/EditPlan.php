<?php

namespace App\DTO\Plan;

class EditPlan
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $url,
        public readonly float $price = 0.00,
        public readonly ?string $description = null
    )
    {}
}
