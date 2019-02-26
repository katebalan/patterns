<?php

namespace php\reflection;

class Person
{
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

interface Module
{
    public function execute();
}

class FtpModule implements Module
{
    private $host;
    private $user;

    public function execute()
    {
        print "FtpModule::execute(): {$this->user} is located on {$this->host}\n";
    }

    public function setHost($host)
    {
        $this->host = $host;
        print "FtpModule::setHost(): $host\n";
    }

    public function setUser($user)
    {
        $this->user = $user;
        print "FtpModule::setUser(): $user\n";
    }
}

class PersonModule implements Module
{
    private $person;

    public function execute()
    {
        print "PersonModule::execute(): {$this->person->getName()}\n";
    }

    public function setPerson(Person $person)
    {
        $this->person = $person;
        print "PersonModule::setPerson(): {$person->getName()}\n";
    }
}

class ModuleRunner {
    private $config = [
        'PersonModule' => ['person' => 'Jane Dou'],
        'FtpModule' => [
            'host' => 'http://google.com/',
            'user' => 'Anon'
        ]
    ];

    private $modules = [];

    public function init() {
        try {
            $interface = new \ReflectionClass(__NAMESPACE__ . '\\Module');
        } catch (\Exception $e) {}
        foreach ($this->config as $moduleName => $params) {
            try {
                $module_class = new \ReflectionClass(__NAMESPACE__ . '\\' . $moduleName);
            } catch (\Exception $e) {}
            if (! $module_class->isSubclassOf($interface)) {
                throw new \Exception('Unknown module');
            }

            $module = $module_class->newInstance();
            foreach ($module_class->getMethods() as $method) {
                $this->handleMethod($module, $method, $params);
            }
            array_push($this->modules, $module);
        }
    }

    public function handleMethod(Module $module, \ReflectionMethod $method, $params) {
        $name = $method->getName();
        $args = $method->getParameters();

        if (count($args) != 1 || substr($name, 0, 3) != 'set') {
            return false;
        }

        $property = strtolower(substr($name, 3));
        if (!$params[$property]) {
            return false;
        }

        $arg_class = $args[0]->getClass();
        if ($arg_class) {
            $method->invoke($module, $arg_class->newInstance($params[$property]));
        } else {
            $method->invoke($module, $params[$property]);
        }

        return false;
    }

    public function execute() {
        foreach ($this->modules as $module) {
            $module->execute();
        }
    }
}

$moduleRunner = new ModuleRunner();
try {
    $moduleRunner->init();
} catch (\Exception $e) {}

print "\n*********\n";
$moduleRunner->execute();

print "\n*********\n";
var_dump($moduleRunner);
