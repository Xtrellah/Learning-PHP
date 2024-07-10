<?php

declare(strict_types=1);

class Cow {
    public string $name;
    public int $age;
    public string $breed;
    public float $height;

    public function __construct(string $name, int $age, string $breed, float $height)
    {
        $this->name = $name;
        $this->age = $age;
        $this->breed = $breed;
        $this->height = $height;
    }

    public function introduce(): string
    {
        return "Hello, my name is $this->name. I am a $this->breed. Moo!";
    }

    public function sleep(): string
    {
        return 'zzzz';
    }

    public function birthday(): void
    {
        $this->age++;
    }

    public function getStats(): string
    {
        return "Name: $this->name <br /> Age: $this->age <br /> Breed: $this->breed <br /> Height: $this->height <br />";
    }
}

class Barn {
    public string $name;
    public array $animals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function storeAnimal($animal): void
    {
        $this->animals[] = $animal;
    }

    public function getAnimals(): string
    {
        $result = '';
        foreach($this->animals as $animal) {
            $result .= $animal->name . ', ';
        }
        return $result;
    }
}

$cow1 = new Cow('Cuthbert', 7, 'Aberdeen Angus', 3.2);
$cow2 = new Cow('Bob', 3, 'Pink cow', 2.3);

$barn = new Barn('Red barn');
$barn->storeAnimal($cow1);
$barn->storeAnimal($cow2);

echo $barn->getAnimals();