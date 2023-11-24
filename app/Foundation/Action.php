<?php

namespace App\Foundation;

abstract class Action
{
    /**
     * @param  array<mixed>  $parameters
     */
    public static function resolve(array $parameters = []): static
    {
        $static = resolve(static::class, $parameters);

        return $static;
    }
}
