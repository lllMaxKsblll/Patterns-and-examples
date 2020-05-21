<?php
abstract class Repairer
{

    abstract function getWorker() : MastersSkills;

    public function fix()
    {
        $worker = $this->getWorker();
        $worker->repair();
    }
}

class ElectricianFactory extends Repairer
{
    public function getWorker() : MastersSkills
    {
        return new Electrician();
    }
}
class MechanicFactory extends Repairer
{
    public function getWorker() : MastersSkills
    {
        return new Mechanic();
    }
}




interface MastersSkills
{
    public function repair();
}

class Electrician implements MastersSkills
{
    public function repair()
    {
        echo "Ремонтирую электрику...";
    }
}

class Mechanic implements MastersSkills
{
    public function repair()
    {
        echo "Ремонтирую механизмы...";
    }
}


