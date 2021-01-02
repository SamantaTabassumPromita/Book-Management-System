<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class loginTest extends TestCase
{
    public function testCanBeCreatedFromValidLogin(): void
    {
        $this->assertInstanceOf(
            login::class,
            login::fromString('mehedi')
        );
    }

    public function testCannotBeCreatedFromInvalidLogin(): void
    {
        $this->expectException(InvalidArgumentException::class);

        login::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'mehedi',
            login::fromString('mehedi')
        );
    }
}