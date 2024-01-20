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
        public readonly string $id,
        public readonly string $name,
        public readonly string $url,
        public readonly float $price,
        public readonly ?string $description = null
    )
    {}
}
