<?php

class Car
{
    public string $model;
    public string $engineType;
    public bool $autopilot;
    public bool $conditioner;
}

interface CarsBuilder
{
    public function setModel($model);
    public function setEngineType(string $engineType);
    public function setAutopilot(bool $autopilot);
    public function setConditioner(bool $conditioner);
}
class RX7Builder implements CarsBuilder
{
    private $car;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->car = new Car();
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        $this->car->model = $model;
    }

    /**
     * @param int $engineType
     */
    public function setEngineType(string $engineType)
    {
        $this->car->engineType = $engineType;
    }

    /**
     * @param bool $autopilot
     */
    public function setAutopilot(bool $autopilot)
    {
        $this->car->autopilot = false;
    }

    /**
     * @param bool $conditioner
     */
    public function setConditioner(bool $conditioner)
    {
        $this->car->conditioner = $conditioner;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $result = $this->car;
        $this->reset();
        return $result;
    }
}
class TeslaM3Builder implements CarsBuilder
{
    private $car;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->car = new Car();
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        $this->car->model = $model;
    }

    /**
     * @param int $engineType
     */
    public function setEngineType(string $engineType)
    {
        $this->car->engineType = $engineType;
    }

    /**
     * @param bool $autopilot
     */
    public function setAutopilot(bool $autopilot)
    {
        $this->car->autopilot = $autopilot;
    }

    /**
     * @param bool $conditioner
     */
    public function setConditioner(bool $conditioner)
    {
        $this->car->conditioner = $conditioner;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $result = $this->car;
        $this->reset();
        return $result;
    }
}
class CarManualBuilder implements CarsBuilder
{
    private $car;

    public function __construct()
    {
        $this->reset();
        return $this;
    }

    public function reset()
    {
        $this->car = new Car();
        return $this;
    }

    /**
     * @param $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->car->model = $model;
        return $this;
    }

    /**
     * @param int $engineType
     * @return $this
     */
    public function setEngineType(string $engineType)
    {
        $this->car->engineType = $engineType;
        return $this;
    }

    /**
     * @param bool $autopilot
     * @return $this
     */
    public function setAutopilot(bool $autopilot)
    {
        $this->car->autopilot = $autopilot;
        return $this;
    }

    /**
     * @param bool $conditioner
     * @return $this
     */
    public function setConditioner(bool $conditioner)
    {
        $this->car->conditioner = $conditioner;
        return $this;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $result = $this->car;
        $this->reset();
        return $result;
    }
}

class CarBuilderManager
{
    public CarsBuilder $carBuilder;

    public function setBuilder(CarsBuilder $carBuilder)
    {
        $this->carBuilder = $carBuilder;
    }

    public function buildMazdarx7()
    {
        $this->carBuilder->setModel('Mazda RX-7');
        $this->carBuilder->setEngineType('Rotor');
        $this->carBuilder->setConditioner(true);
        return $this->carBuilder->get();
    }

    public function buildTeslaM3()
    {
        $this->carBuilder->setModel('Tesla Model 3');
        $this->carBuilder->setEngineType('Electric');
        $this->carBuilder->setAutopilot(true);
        $this->carBuilder->setConditioner(true);
        return $this->carBuilder->get();
    }
}

$rx7Builder = new RX7Builder();
$teslaM3 = new TeslaM3Builder();
$manualBuilder = new CarManualBuilder();

$manager = new CarBuilderManager();
$manager->setBuilder($rx7Builder);
$car = $manager->buildMazdarx7();

$manager->setBuilder($teslaM3);
$car2 = $manager->buildTeslaM3();

$car3 = $manualBuilder->reset()
    ->setModel('Nissan')
    ->setEngineType('ICE')
    ->setConditioner(true)
    ->setAutopilot(false)
    ->get();

var_dump($car); echo "<br>";
var_dump($car2); echo "<br>";
var_dump($car3); echo "<br>";
