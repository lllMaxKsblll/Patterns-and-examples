<?php
abstract class Repairer
{

    abstract function getWorker() : Masters;

    public function fix()
    {
        $worker = $this->getWorker();
        $worker->repair();
    }
}

class ElectricianFactory extends Repairer
{
    public function getWorker() : Masters
    {
        return new Electrician();
    }
}
class MechanicFactory extends Repairer
{
    public function getWorker() : Masters
    {
        return new Mechanic();
    }
}




interface Masters
{
    public function repair();
}

class Electrician implements Masters
{
    public function repair()
    {
        echo "Ремонтирую электрику...";
    }
}

class Mechanic implements Masters
{
    public function repair()
    {
        echo "Ремонтирую механизмы...";
    }
}

$w1 = new ElectricianFactory();
$w1->fix();
