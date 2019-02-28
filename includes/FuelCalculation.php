<?php
/**Project 2 - Fuel Calculation
 *
 */

namespace P2;

class FuelCalculation
{
    # Properties
    private $startingDistance;
    private $endingDistance;
    private $fuelVolume;
    private $distanceUnit;
    private $volumeUnit;

    # Methods
    public function __construct($fuelVolume, $startingDistance, $endingDistance)
    {
        $this->fuelVolume = $fuelVolume;
        $this->startingDistance = $startingDistance;
        $this->endingDistance = $endingDistance;
    }
    #get and set methods
    public function getStartingDistance(): float
    {
        return $this->startingDistance;
    }

    public function setStartingDistance($startingDistance)
    {
        $this->$startingDistance = $startingDistance;
    }

    public function getEndingDistance(): float
    {
        return $this->endingDistance;
    }

    public function setEndingDistance($endingDistance)
    {
        $this->$endingDistance = $endingDistance;
    }

    public function getDistanceUnit()
    {
        return $this->distanceUnit;
    }

    public function setDistanceUnit($distanceUnit)
    {
        $this->distanceUnit = $distanceUnit;
    }

    public function getVolumeUnit()
    {
        return $this->volumeUnit;
    }

    public function setVolumeUnit($volumeUnit)
    {
        $this->volumeUnit = $volumeUnit;
    }

    public function getFuelVolume(): float
    {
        return $this->fuelVolume;
    }

    public function setFuelVolume($volume)
    {
        $this->fuelVolume = $volume;
    }
    #fuel calculation method - this is intentionally without units so you could calculate miles/liter if desired
    public function getFuelConsumed(): float
    {
        $fuelConsumed = ($this->getEndingDistance() - $this->getStartingDistance()) / $this->getFuelVolume();
        return (float)number_format($fuelConsumed, 1, '.', '');
    }
}