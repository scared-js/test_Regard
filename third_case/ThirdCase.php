<?php

namespace App\Models;

class ThirdCase
{
    private $boxes;
    private $weight;
    private $travels = 0;

    public function __construct(array $boxes, int $weight)
    {
        $this->boxes = $boxes;
        $this->weight = $weight;
    }

    private function find_couple(): void
    {
        $bool = false;
        foreach ($this->boxes as $key_one => $box_one) {
            foreach ($this->boxes as $key_two => $box_two) {
                if (($box_one + $box_two === $this->weight) && ($key_one !== $key_two)) {
                    $this->travels++;
                    unset($this->boxes[$key_one]);
                    unset($this->boxes[$key_two]);
                    $bool = true;
                    break 2;
                }
            }
        }
        if(count($this->boxes) && $bool){
            $this->find_couple();
        }
    }

    public function count_travels(): int
    {
        $this->find_couple();
        return $this->travels;
    }

}
