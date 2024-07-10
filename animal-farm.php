<?php

declare(strict_types=1);


/**
 * Inheritance
 *
 * Classes can extend other classes - creating a parent/child relationship between classes
 *
 * A child class inherits properties and methods from it's parent
 *
 * A class can only extend 1 class, but there can be infinite layers of inheritance
 *
 * It's not just about making reusable code
 * Inheritance creates family tree. By extending some class, we are saying that child is directly related to the parent
 * They are the same type of thing
 */


// Contain generic Animal things at all animals can do
// Because the Animal is an abstract idea used for inheritance
// We declare it as abstract - that prevents anyone from instantiating an Animal
// Instead they must instantiate the animal types - Pig etc
abstract class Animal {
    public string $name;
    public string $colour;

    public function __construct(string $name, string $colour)
    {
        $this->name = $name;
        $this->colour = $colour;
    }

    public function eat(string $food): string
    {
        return "mmmmmm $food";
    }

    public function sleep(): string
    {
        return 'zzzzz';
    }
}

// Contains Pig specific code only
// It inherits the generic animal stuff from the Animal parent class
class Pig extends Animal {
    public function rollInSlop(): string
    {
        return 'Squelch';
    }
}

// Contains Cow specific code only
// It inherits the generic animal stuff from the Animal parent class
class Cow extends Animal {
    public function makeMilk(): string
    {
        return 'Have some milk';
    }
}

class Duck extends Animal {
    // Child classes are able to override methods from their parent
    // By just redefining them
    // When we do this, we keep the method signature the same to make sure all animals can be treated in the same
    // way - polymorphism
    public function eat(string $food): string
    {
        return "Quack quack thanks for the $food";
    }
    public function duckStuff(): string
    {
        return "Duck things idk";
    }
}


class Barn {
    public array $animals;

    public function storeAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function feedAnimals(string $food): void
    {
        foreach ($this->animals as $animal) {
            echo $animal->eat($food);
        }
    }
}

$barn = new Barn();

$pig = new Pig('Chris P Bacon', 'Pink');
$cow = new Cow('Bob', 'Yellow');
$duck = new Duck('Ducky', 'Purple');


$barn->storeAnimal($pig);
$barn->storeAnimal($cow);
$barn->storeAnimal($duck);

$barn->feedAnimals('Grass');