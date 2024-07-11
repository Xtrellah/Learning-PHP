<?php

declare(strict_types = 1);

/**
 * Exercise
 *
 * Create a class called EmailAddress
 * It should have an email property (string) that is set to private
 *
 * Add a constructor that sets the email if it's valid (clue incoming)
 * If the email is not valid throw an exception with the message 'invalid email address'
 *
 * Add a getter to make it readonly - no setter
 */

class EmailAddress {
    private string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email address');
        }
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

$address = new EmailAddress('dodgy@dodgy.com');
echo $address->getEmail();

$email = 'ashley.coles@thing.com';

var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));