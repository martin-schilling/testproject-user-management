<?php

declare(strict_types = 1);

namespace App\Infrastructure\ValueObject;

interface ValueObject {
    
    public static function fromArray(array $data): ValueObject;

    public function toArray(): array;
}
