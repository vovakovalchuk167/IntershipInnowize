<?php

namespace src;

class Task12
{
    private int $a = 0;
    private int $b = 0;
    public function __construct($a = 0, $b = 0)
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException();
        }
        if ($a == null) {
            $this->a = 0;
        } else {
            $this->a = $a;
        }
        if ($b == null) {
            $this->b = 0;
        } else {
            $this->b = $b;
        }
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
        if ($this->b === 0) {
            throw new \InvalidArgumentException();
        }

        return new Task12($this->a / $this->b, 0);
    }
    public function subtract(): Task12
    {
        return new Task12($this->a - $this->b, 0);
    }
    public function addBy(?int $num = 0): Task12
    {
        if ($num == null) {
            $num = 0;
        }

        return new Task12($this->a + $num, 0);
    }
    public function divideBy(?int $num = 0): Task12
    {
        if ($num == null) {
            $num = 0;
        }
        if ($num === 0) {
            throw new \InvalidArgumentException();
        }

        return new Task12($this->a / $num, 0);
    }
    public function multiplyBy(?int $num = 0): Task12
    {
        if ($num == null) {
            $num = 0;
        }

        return new Task12($this->a * $num, 0);
    }
    public function subtractBy(?int $num = 0): Task12
    {
        if ($num == null) {
            $num = 0;
        }

        return new Task12($this->a - $num, 0);
    }
    public function __toString(): string
    {
        return $this->a;
    }
}
