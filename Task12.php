<?php

namespace src;

class Task12
{
    private int $a;
    private int $b;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function add(): Task12
    {
        return new Task12($this->a + $this->b, 0);
    }

    public function multiply(): Task12
    {
        return new Task12($this->a * $this->b, 0);
    }

    public function divide(): Task12
    {
        return new Task12($this->a / $this->b, 0);
    }

    public function subtract(): Task12
    {
        return new Task12($this->a - $this->b, 0);
    }

    public function addBy(int $num): Task12
    {
        return new Task12($this->a + $num, 0);
    }

    public function divideBy(int $num): Task12
    {
        return new Task12($this->a / $num, 0);
    }

    public function multiplyBy(int $num): Task12
    {
        return new Task12($this->a * $num, 0);
    }

    public function subtractBy(int $num): Task12
    {
        return new Task12($this->a - $num, 0);
    }

    public function __toString(): string
    {
        return $this->a;
    }
}

