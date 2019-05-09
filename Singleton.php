<?php
declare(strict_types=1);

final class Singleton{
    private $name;
    private static $instance = null;
    
    private function __construct(?string $name) {
        $this->name = $name;
    }

    public static function getInstance() :Singleton {
        if (is_null(self::$instance)) {
            self::$instance = new Singleton(null);
        }
        return self::$instance;
    }

    public function setName(string $name):void {
        self::$instance->name = $name;
    }

    public function getName() :string {
        return self::$instance->name;
    }
}

/* Test */
$s = Singleton::getInstance();
$s->setName("SingleName");
$r = Singleton::getInstance();
var_dump($r->getName()); // SingleName
