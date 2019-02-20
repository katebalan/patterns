<?php

class Person {
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age): void
    {
        $this->age = $age;
    }
}

class PersonWriter {
    private $callbacks = [];

    public function registerCallback($callback)
    {
        if (!is_callable($callback)) {
            throw new Exception('This callback is callable!');
        }
        $this->callbacks[] = $callback;
    }

    public function write(Person $person)
    {
        print "Person's name: " . $person->getName() . "(It's age is " . $person->getAge() . ")\n";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $person);
        }
    }
}

$logger = function (Person $person) { print "Log: {$person->getName()}\n"; };

$writer = new PersonWriter();
try {
    $writer->registerCallback($logger);
} catch (Exception $e) {}

$person = new Person('Jane', 22);
$writer->write($person);
$person->setName('Jane Dou');
$writer->write($person);

$person2 = new Person('Greg', 14);
$writer->write($person2);
