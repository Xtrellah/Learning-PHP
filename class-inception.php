<?php

declare(strict_types=1);

class Animal {
    public string $name;
    public string $colour;

    public function __construct(string $name, string $colour)
    {
        $this->name = $name;
        $this->colour = $colour;
    }

    public function eat(string $food)
    {
        return "I like to eat $food </br>";
    }

    public function stat(string $type)
    {
        return "I am a $type animal</br>";
    }

    public function introduction(string $species, string $name)
    {
        return "My name is $name I am a $species</br>";
    }
}

class Komodo extends Animal {
    public function predator(): string
    {
        return 'Hunting';
    }
}

class Goat extends Animal {
    public function prey(): string
    {
        return 'Hunted';
    }
}

$Komodo = new Komodo($name = 'Kommo-O', $colour = 'Green');
$Goat = new Goat($name = 'Billy', $colour = 'White');

echo $Komodo->introduction('Komodo Dragon', $name);
echo $Komodo->stat('Predator');
echo $Komodo->eat('Goats');

echo $Goat->introduction('Goat', $name);
echo $Goat->stat('Prey');
echo $Goat->eat('Grass');