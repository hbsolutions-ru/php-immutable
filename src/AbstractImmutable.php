<?php declare(strict_types=1);

namespace HBS\Immutable;

use HBS\Immutable\Exception\AccessViolationException;

abstract class AbstractImmutable implements ImmutableInterface
{
    /**
     * @var bool
     */
    private $isInitialized = false;

    /**
     * @var array
     */
    protected $data = [];

    public function __construct()
    {
        if ($this->isInitialized === true) {
            throw new AccessViolationException("Object modification is forbidden");
        }
        $this->isInitialized = true;
    }

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name] ?? null;
        }
        throw new AccessViolationException(sprintf("Property '%s' does not exist", $name));
    }

    public function __set(string $name, $value): void
    {
        throw new AccessViolationException("Object modification is forbidden");
    }

    public function __unset(string $name): void
    {
        throw new AccessViolationException("Object modification is forbidden");
    }
}
