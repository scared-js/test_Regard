<?php

namespace App\Models;

class FirstCase
{
    private $name;
    public $next;
    public $previous;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function refraction(): void
    {
        if ($this->previous instanceof FirstCase) {
            $this->next = $this->previous;
            $this->next->refraction();
        } else {
            $this->next = $this->previous;
        }
    }

    public function reverse(): void
    {
        if ($this->next instanceof FirstCase) {
            $this->next->previous = $this;
            $this->next->reverse();
        } else if(is_null($this->next)){
            $this->next = $this->previous;
            $this->next->refraction();
        }
    }
}