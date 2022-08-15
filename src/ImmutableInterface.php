<?php declare(strict_types=1);

namespace HBS\Immutable;

interface ImmutableInterface
{
    public function __get(string $name);

    public function __set(string $name, $value): void;

    public function __unset(string $name): void;
}
