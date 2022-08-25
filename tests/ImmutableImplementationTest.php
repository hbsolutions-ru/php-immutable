<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use HBS\Immutable\Exception\AccessViolationException;

final class ImmutableImplementationTest extends TestCase
{
    public function testGetProperty(): void
    {
        $host = "localhost:3306";
        $user = "root";
        $password = "P@sSw0rD";
        $dbName = "my_app";

        $dbSettings = new DatabaseSettings($host, $user, $password, $dbName);

        $this->assertEquals($host, $dbSettings->host);
        $this->assertEquals($user, $dbSettings->user);
        $this->assertEquals($password, $dbSettings->password);
        $this->assertEquals($dbName, $dbSettings->dbName);
    }

    public function testImmutability(): void
    {
        $host = "localhost:3306";
        $user = "root";
        $password = "P@sSw0rD";
        $dbName = "my_app";

        $dbSettings = new DatabaseSettings($host, $user, $password, $dbName);

        $this->expectException(AccessViolationException::class);
        $this->expectErrorMessage("Object modification is forbidden");

        $dbSettings->password = "secret";
    }
}
