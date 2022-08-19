<?php declare(strict_types=1);

namespace Tests;

use HBS\Immutable\AbstractImmutable;

/**
 * @property string $host
 * @property string $user
 * @property string $password
 * @property string $dbName
 */
final class DatabaseSettings extends AbstractImmutable
{
    private const HOST = 'host';
    private const USER = 'user';
    private const PASSWORD = 'password';
    private const DB_NAME = 'dbName';

    public function __construct(string $host, string $user, string $password, string $dbName)
    {
        $this->data[self::HOST] = $host;
        $this->data[self::USER] = $user;
        $this->data[self::PASSWORD] = $password;
        $this->data[self::DB_NAME] = $dbName;

        parent::__construct();
    }
}
