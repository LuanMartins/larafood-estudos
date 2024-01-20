<?php

namespace App\DTO\Plan;

class CreatePlan
{
    public function __construct(
        public readonly string $name,
        public readonly string $url,
        public readonly float $price,
        public readonly ?string $description = null
    )
    {}
}
