<?php
/**
 * C&C3 example
 */


class GDITrooper
{
    private int $attackPower = 3;
    public function getPower()
    {
        return $this->attackPower;
    }
}

class GDIFlyingVehicle
{
    private int $attackPower = 20;
    public function getPower()
    {
        return $this->attackPower;
    }
}

class GDITank
{
    private int $attackPower = 70;
    public function getPower()
    {
        return $this->attackPower;
    }
}

class NODTrooper
{
    private int $attackPower = 2;
    public function getPower()
    {
        return $this->attackPower;
    }
}

class NODFlyingVehicle
{
    private int $attackPower = 30;
    public function getPower()
    {
        return $this->attackPower;
    }
}

class NODTank
{
    private int $attackPower = 50;
    public function getPower()
    {
        return $this->attackPower;
    }
}

class ScrinTrooper
{
    private int $attackPower = 10;
    public function getPower()
    {
        return $this->attackPower;
    }
}

class ScrinFlyingVehicle
{
    private int $attackPower = 60;
    public function getPower()
    {
        return $this->attackPower;
    }
}

class ScrinTank
{
    private int $attackPower = 40;
    public function getPower()
    {
        return $this->attackPower;
    }
}


//----------------------------------------------------------------------------------------------------------------------
interface ArmyFactory
{
    public function createTrooper();

    public function createFlyingVehicle();

    public function createTank();
}

class GDIArmyFactory implements ArmyFactory
{
    public function createTrooper()
    {
        return new GDITrooper();
    }

    public function createFlyingVehicle()
    {
        return new GDIFlyingVehicle();
    }

    public function createTank()
    {
        return new GDITank();
    }
}


class NODArmyFactory implements ArmyFactory
{
    public function createTrooper()
    {
        return new NODTrooper();
    }

    public function createFlyingVehicle()
    {
        return new NODFlyingVehicle();
    }

    public function createTank()
    {
        return new NODTank();
    }
}


class ScrinArmyFactory implements ArmyFactory
{
    public function createTrooper()
    {
        return new ScrinTrooper();
    }

    public function createFlyingVehicle()
    {
        return new ScrinFlyingVehicle();
    }

    public function createTank()
    {
        return new ScrinTank();
    }
}

class UnitFactory
{
    private string $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getFactory() : ArmyFactory
    {
        switch ($this->type){
            case 'GDI':
                return new GDIArmyFactory();
            break;

            case 'NOD':
                return new NODArmyFactory();
            break;

            case 'Scrin':
                return new ScrinArmyFactory();
            break;
            default : throw new Exception("Wrong unit type \"$this->type\"");
        }
    }
}

$scrinUnitFactory = (new UnitFactory('Scrin'))->getFactory();
$scrinTrooper = $scrinUnitFactory->createTrooper();

$gdiUnitFactory = (new UnitFactory('GDI'))->getFactory();
$gdiTank = $gdiUnitFactory->createTank();

echo $scrinTrooper->getPower() . "<br>";
echo $gdiTank->getPower() . "<br>";
