<?php


abstract class CompositeUnit extends Unit
{
    protected $units = [];

    public function getComposite()
    {
        return $this;
    }

    protected function units()
    {
        return $this->units;
    }

    public function addUnit(Unit $unit)
    {
        if (in_array($unit, $this->units, true)){
            return;
        }
        $this->units[] = $unit;
        $unit->setDepth($this->depth + 1);
    }

    public function removeUnit(Unit $unit)
    {
        $this->units = array_diff($this->units, [$unit]);
    }

    function accept(ArmyVisitor $visitor)
    {
        parent::accept($visitor);
        foreach ($this->units as $unit){
            $unit->accept($visitor);
        }
    }

}










//        $this->units = array_udiff( $this->units, array($unit), function ($a, $b) {
//            return ($a === $b)  ? 0 : 1 ;
//        } );