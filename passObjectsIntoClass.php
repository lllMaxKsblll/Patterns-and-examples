<?php

class ModuleA
{
    public function doSomething()
    {
        echo 'Hello from doSomething' . PHP_EOL;
    }

    public function doSomeStuff()
    {
        echo 'Hello from doSomeStuff' . PHP_EOL;
    }
}

class ModuleB
{
    public function doSomethingElse()
    {
        echo 'Hello from doSomethingElse' . PHP_EOL;
    }

    public function doSomeAnotherStuff()
    {
        echo 'Hello from doSomeAnotherStuff' . PHP_EOL;
    }
}

const METHODS_MAP = [
    'doSomething' => ModuleA::class,
    'doSomeStuff' => ModuleA::class,
    'doSomethingElse' => ModuleB::class,
    'doSomeAnotherStuff' => ModuleB::class,
];

class Robot
{
    private $modules;

    public function __construct(array $modules)
    {
        $this->modules = $modules;
    }

    public function __call($name, $arguments = [])
    {
        if (!isset(METHODS_MAP[$name])) {
            throw new Exception('Unsupported action');
        }

        $module = METHODS_MAP[$name];
        if (!isset($this->modules[$module])) {
            throw new Exception('Module not included');
        }

        $this->modules[$module]->$name($arguments);
    }
}

$modules = [
    ModuleA::class => new ModuleA(),
    ModuleB::class => new ModuleB(),
];

$robot = new Robot($modules);

$robot->__call('doSomething');