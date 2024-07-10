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
        return 'Moo, my name is ' . $this->name . 'I am a ' . $this->breed . ' and I am ' . $this->age . ' years old <br />';
    }

    public function sleep(): string
    {
        echo "zzz";
    }
}

$Cow = new Cow('Henry', 7, 'Dairy Cow', 1.78);
