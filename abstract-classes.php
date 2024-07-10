<?php

declare(strict_types=1);

// In abstract classes methods can be declared as abstract
// We only write the method's signature, not it's body
// It forces children to implement their own version of the abstract method

abstract class Product {
    public string $name;
    public string $description;
    public float $price;

    public function __construct(string $name, string $description, float $price)
    {
        if ($price < 0) {
            throw new Exception('Error: A products price cannot be negative');
        }

        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getProductDisplay(): string
    {
        return "
            <div>
                <h2>$this->name</h2>
                <p>$this->description</p>
                <span>$this->price</span>
            </div>
        ";
    }

    abstract public function getShippingCost(): float;
}


// PhysicalProduct
class PhysicalProduct extends Product {
    public float $weight;

    // When you have a child class that needs to override it's parent's constructor
    // We add a new construct method with all the params it needs
    // It routes the params from it's parent via the parent's constructor
    public function __construct(string $name, string $description, float $price, float $weight)
    {
        parent::__construct($name, $description, $price);
        $this->weight = $weight;
    }

    public function getShippingCost(): float
    {
        if ($this->price >= 100) {
            return 0;
        }

        if ($this->weight < 10) {
            return 0.5;
        }

        return 2.5;
    }
}


// VirtualProduct
class VirtualProduct extends Product {
    public function getShippingCost(): float
    {
        return 0;
    }
}


//In use:
$hat = new PhysicalProduct('Nice hat', 'A very nice hat', 201.99, 1);
$boots = new PhysicalProduct('Boots', 'A pair of boots', 2.99, 0.5);
$ticket = new VirtualProduct('Rip off ticket to see a crap band', 'Wat', 3000);

$basket = [$hat, $boots, $ticket];

foreach ($basket as $product) {
    echo $product->getProductDisplay();
}

$postage = 0;
foreach ($basket as $product) {
    $postage += $product->getShippingCost();
}

echo "<br />Your postage charge will be $postage";



