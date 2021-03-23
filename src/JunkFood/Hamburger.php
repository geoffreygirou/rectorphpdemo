<?php

namespace App\JunkFood;

class Hamburger
{
    private $attractiveName;
    private $meet;
    private $vegetables;
    private $fat;

    public function __construct(
        string $attractiveName = "",
        float $meet = 0.0,
        float $vegetables = 0.0,
        float $fat = 0.0
    ) {
        $this->attractiveName = $attractiveName;
        $this->meet = $meet;
        $this->vegetables = $vegetables;
        $this->fat = $fat;
    }

    public function classify() : void
    {
        switch ($this->meet) {
            case 0.1:
                $this->simple();
                break;

            case 0.2:
                $this->double();
                break;

            default:
                throw new \Exception('Meet weight not correct');
        }
    }

    public function respectStandards()
    {
        try {
            $this->classify();
        } catch (\Exception $exception) {
            //Do Stuff
        }
    }

    public function isStillAttractive(): bool
    {
        return strpos($this->attractiveName, 'super') !== false;
    }

    public function simple() : void
    {
        $this->setAttractiveName($this->attractiveName.'simple');
    }

    public function double() : void
    {
        $this->setAttractiveName($this->attractiveName.'double');
    }

    /**
     * @param float $meet
     */
    public function setMeet(float $meet): void
    {
        $this->meet = $meet;
    }

    /**
     * @param float $vegetables
     */
    public function setVegetables(float $vegetables): void
    {
        $this->vegetables = $vegetables;
    }

    /**
     * @param float $fat
     */
    public function setFat(float $fat): void
    {
        $this->fat = $fat;
    }

    /**
     * @param string $attractiveName
     */
    public function setAttractiveName(string $attractiveName): void
    {
        $this->attractiveName = $attractiveName;
    }
}