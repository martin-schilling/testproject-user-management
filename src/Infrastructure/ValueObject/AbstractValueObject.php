<?php

declare(strict_types = 1);

namespace App\Infrastructure\ValueObject;

abstract class AbstractValueObject {
    
    public static function fromArray(array $data): AbstractValueObject
    {
        $instance = new static();
        $instance->merge($data);
        return $instance;
    }

    public function merge(array $data): void 
    {
        foreach($data as $property => $value) {
            if(!property_exists(static::class, $property)) {
                throw new \InvalidArgumentException(
                    static::class . " does not have a property called $property"
                );
            }

            $this->$property = $value;
        }
    }

    public function toArray(): array 
    {
        return (array)$this;
    }
}
