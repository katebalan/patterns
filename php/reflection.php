<?php

class Person {
  private $name;

  public function __construct($name)
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getName()
  {
      return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name)
  {
      $this->name = $name;
  }
}

interface Module {
  public function execute();
}

class FtpModule implements Module {
  public function execute()
  {
      // TODO: Implement execute() method.
  }

  public function setHost($host) {
    print "FtpModule::setHost(): $host\n";
  }

  public function setUser($user) {
    print "FtpModule::setUser(): $user\n";
  }
}

class PersonModule implements Module {
  public function execute()
  {
      // TODO: Implement execute() method.
  }

  public function setPerson(Person $person) {
    print "PersonModele::setPerson: {$person->getName()}";
  }
}
