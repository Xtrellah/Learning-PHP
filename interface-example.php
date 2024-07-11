<?php

declare(strict_types = 1);

// We have three unrelated classes
// That just happen to have common functionality

// We use an interface
// Gives us some of the benefits of an abstract class, without creating a family tree
// Interfaces are similar to abstract methods, but unlike abstract classes they cannot contain implementations
// of methods - only signatures

// Interfaces create contracts - if a class implements a given interfaces
// That class must implement all the methods from that interface

// A class can implement as many interfaces as it needs

// We can type hint by interface
interface Sittable
{
    public function sitOn(): string;
}

interface Moveable
{
    public function move(): string;
}

class Horse implements Sittable, Moveable {
    public function sitOn(): string
    {
        return 'You sat on the horse';
    }

    public function move(): string
    {
        return 'Neigh we moved';
    }
}
class Tractor implements Sittable, Moveable {
    public function sitOn(): string
    {
        return 'You sat on the tractor';
    }

    public function move(): string
    {
        return 'Brum brum';
    }
}
class HayBale implements Sittable {
    public function sitOn(): string
    {
        return 'You sat on the hay bale';
    }
}


function sitOnStuff(Sittable $sittable) {
    echo $sittable->sitOn();
}

$tractor = new Tractor();
sitOnStuff($tractor);
$hayBale = new HayBale();
sitOnStuff($hayBale);