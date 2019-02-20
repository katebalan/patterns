<?php

class Person {
    private $name;
    private $age;
    private $friends;

    public function __construct($name, $age, $friends)
    {
        $this->name = $name;
        $this->age = $age;
        $this->friends = $friends;
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

    public function getFriends()
    {
        return $this->friends;
    }

    public function setFriends($friends): void
    {
        $this->friends = $friends;
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
        print "\nPerson's name: " . $person->getName() . "(It's age is " . $person->getAge() . ")\n";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $person);
        }
    }
}

class PersonChecker {
    public function isAdult(Person $person) {
        if ($person->getAge() >= 18) {
            print $person->getName() . "'s age is more than 18.\n";
        }
    }

    static public function isMinor() {
        return function (Person $person) {
            if ($person->getAge() < 18) {
                print $person->getName() . "'s age is less than 18.\n";
            }
        };
    }

    static public function canCreateCompany($number) {
        $count = 0;
        return function (Person $person) use ($number, &$count) {
            $count += $person->getFriends();
            if ($count > $number) {
                print "\nA company from {$number} persons can be created.\n";
            }
        };
    }
}

$logger = function (Person $person) { print "Log: {$person->getName()}\n"; };

$writer = new PersonWriter();
try {
    $writer->registerCallback($logger);
} catch (Exception $e) {}

$person = new Person('Jane', 22, 3);
$writer->write($person);
$person->setName('Jane Dou');
$writer->write($person);

$person2 = new Person('Greg', 14, 2);
$writer->write($person2);

try {
    $writer->registerCallback(array(new PersonChecker(), 'isAdult'));
    $writer->registerCallback(PersonChecker::isMinor());
    $writer->registerCallback(PersonChecker::canCreateCompany(4));
    $writer->registerCallback(PersonChecker::canCreateCompany(6));
} catch (Exception $e) {}

$writer->write($person);
$writer->write($person2);

$person3 = new Person('David', 32, 2);
$writer->write($person3);
