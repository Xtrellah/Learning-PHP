<?php

declare(strict_types = 1);

// Information that we need to be valid can be protected
// By using getters and setters

// We make the property private/protected
// That alone stops someone from messing with
// We give access to view the information by making a getter method
// If we need the ability to change the information, we make a setter method
class Pig {
    private int $legCount;

    public function __construct(int $legCount = 4)
    {
        // It's best practice to use any setters in the construct so the behavior is consistent
        $this->setLegCount($legCount);
    }

    public function getLegCount(): int
    {
        return $this->legCount;
    }

    public function setLegCount(int $legCount): void
    {
        if ($legCount > 4 || $legCount < 0) {
            throw new Exception('Pigs must have between 0 and 4 legs');
        }

        $this->legCount = $legCount;
    }
}

$pig = new Pig(3);
$pig->setLegCount(4);
echo $pig->getLegCount();


echo '<pre>';
var_dump($pig);