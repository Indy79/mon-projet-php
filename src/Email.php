<?php
/**
 * Ma classe Email
 *
 * @category Jb
 * @package  JB
 * @author   Display Name <username@example.com>
 * @license  iICE http://google.fr
 * @link     JB
 * @email    jb@test.fr
 * */
// phpcs:disable
declare(strict_types=1);
/**
 * ma doc
 * */
final class Email
{
        private $_email;

	/**
	 * */
    private function __construct(string $email)
    {
           $this->ensureIsValidEmail($email);

            $this->_email = $email;
    }

	/**
	 * */
    public static function fromString(string $email): self
    {
           return new self($email);
    }

    /**
     * */
    public function __toString(): string
    {
           return $this->_email;
    }

    function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException(
                    sprintf(
                        '"%s" is not a valid email address',
                        $email
                    )
                );
        }
    }
}
// phpcs:enable
