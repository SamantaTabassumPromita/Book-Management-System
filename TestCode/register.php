<?php declare(strict_types=1);
final class login
{
    private $login;

    private function __construct(string $name)
    {
        $this->ensureIsValidLogin($name;

        $this->name = $name;

    }

    public static function fromString(string $name): self
    {
        return new self($name);
    }

    public function __toString(): string
    {
        return $this->name;
    }

    private function ensureIsValidEmail(string $name): void
    {
        if (!filter_var($name, FILTER_VALIDATE_NAME)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $name
                )
            );
        }
    }
}
