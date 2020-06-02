<?php
namespace Composite;

class Trooper extends Unit
{
    private int $attackPower = 3;

    public function getPower()
    {
        return $this->attackPower;
    }
}

class Firehawk extends Unit
{
    private int $attackPower = 24;

    public function getPower()
    {
        return $this->attackPower;
    }
}

class MammothTank extends Unit
{
    private int $attackPower = 70;

    public function getPower()
    {
        return $this->attackPower;
    }
}

abstract class Unit
{
    abstract function getPower();

    public function addUnit(Unit $unit) : void {}
    public function removeUnit(Unit $unit) : void {}
}

abstract class CompositeUnit extends Unit
{
    protected array $units = [];

    public function addUnit(Unit $unit) :void
    {
        $this->units[] = $unit;
    }

    public function removeUnit(Unit $unit) :void
    {
        $this->units = array_udiff($this->units, [$unit], function ($a,$b) {
            return ($a === $b) ? 0 : 1;
        });
    }
}
class Army extends CompositeUnit
{
    protected array $units = [];

    public function getPower()
    {
        $power = 0;
        foreach ($this->units as $unit){
            $power += $unit->getPower();
        }
        return $power;
    }
}

$army1 = new Army();
$army2 = new Army();

$army1->addUnit(new Trooper());
$army1->addUnit(new Trooper());
$army1->addUnit(new Trooper());
$army1->addUnit(new MammothTank());

$army2->addUnit(new Firehawk());
$army2->addUnit(new Firehawk());
$army2->addUnit(new Firehawk());
$army2->addUnit(new Firehawk());

echo $army1->getPower() . "<br>";
echo $army2->getPower() . "<br>";

$army2->addUnit($army1);

echo $army2->getPower() . "<br>";
