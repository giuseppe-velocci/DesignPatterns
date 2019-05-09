<?php
declare(strict_types=1);

interface iProduct {
    public function setPrice(float $price);
    public function setName (string $name);
}


class MobilePhone implements iProduct {
    protected $name;
    protected $price = 0.0;
    const MAX_PRICE = 1499.99;
    const MAX_LENGTH_NAME = 64;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price; 
    }

    public function setPrice(float $price):bool {
        if ($price < 0 && $price > MAX_PRICE) {
            return false;
        }
        $this->price = $price;
        return true;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setName (string $name):bool {
        if (strlen($name) > MAX_LENGTH_NAME) {
            return false;
        }
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}


class WiredPhone implements iProduct {
    protected $name;
    protected $price = 0.0;
    const MAX_PRICE = 99.99;
    const MAX_LENGTH_NAME = 64;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price; 
    }

    public function setPrice(float $price):bool {
        if ($price < 0 && $price > MAX_PRICE) {
            return false;
        }
        $this->price = $price;
        return true;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setName (string $name):bool {
        if (strlen($name) > MAX_LENGTH_NAME) {
            return false;
        }
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

abstract class AvailableProducts {
    private static $productClasses = [
        "MobilePhone",
        "WiredPhone"
    ];

    public static function isAvailable(string $productClass): bool{
        if (! in_array($productClass, self::$productClasses)) {
            return false;
        }
        return true;
    }
}


class ProductFactory {
    public function makeProduct(string $className, string $name, float $price) :?iProduct {
        if (! AvailableProducts::isAvailable($className)){
            return null;
        }

        return new $className($name, $price);
    }
} 

// Test
$phoneFactory = new ProductFactory();
$wired = $phoneFactory->makeProduct("WiredPhone", "Ax-52", 20.5);
var_dump($wired);
