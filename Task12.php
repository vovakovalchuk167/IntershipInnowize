<?php

namespace src;

class Task12
{
    private int $a;
    private int $b;
    private ?int $result;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function add(): Task12
    {
        $this->result = $this->a + $this->b;

        return $this;
    }

    public function multiply(): Task12
    {
        $this->result = $this->a * $this->b;

        return $this;
    }

    public function divide(): Task12
    {
        if ($this->b === 0) {
            throw new \InvalidArgumentException();
        }
        $this->result = $this->a / $this->b;

        return $this;
    }

    public function subtract(): Task12
    {
        $this->result = $this->a - $this->b;

        return $this;
    }

    public function addBy(int $num): Task12
    {
        $this->result = $this->result + $num;

        return $this;
    }

    public function divideBy(int $num): Task12
    {
        if ($num === 0) {
            throw new \InvalidArgumentException();
        }
        $this->result = $this->result / $num;

        return $this;
    }

    public function multiplyBy(int $num): Task12
    {
        $this->result = $this->result * $num;

        return $this;
    }

    public function subtractBy(int $num): Task12
    {
        $this->result = $this->result - $num;

        return $this;
    }

    public function __toString(): string
    {
        return $this->result;
    }
}
