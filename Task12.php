<?php

namespace src;

class Task12
{
    private int $a = 0;
    private int $b = 0;
    private ?int $res;
    public function __construct($a = 0, $b = 0, $res = null)
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
        $this->res = $res;
    }
    public function add(): Task12
    {
        if ($this->res) {
            return new Task12($this->a, $this->b, $this->res + $this->b);
        }

        return new Task12($this->a, $this->b, $this->a + $this->b);
    }

    public function multiply(): Task12
    {
        if ($this->res) {
            return new Task12($this->a, $this->b, $this->res * $this->b);
        }

        return new Task12($this->a, $this->b, $this->a * $this->b);
    }
    public function divide(): Task12
    {
        if ($this->b === 0) {
            throw new \InvalidArgumentException();
        }
        if ($this->res) {
            return new Task12($this->a, $this->b, $this->res / $this->b);
        }

        return new Task12($this->a, $this->b, $this->a / $this->b);
    }
    public function subtract(): Task12
    {
        if ($this->res) {
            return new Task12($this->a, $this->b, $this->res - $this->b);
        }

        return new Task12($this->a, $this->b, $this->a - $this->b);
    }
    public function addBy(?int $num = 0): Task12
    {
        if ($num == null) {
            $num = 0;
        }
        if ($this->res) {
            return new Task12($this->a, $this->b, $this->res + $num);
        }

        return new Task12($this->a, $this->b, $this->a + $num);
    }
    public function divideBy(?int $num = 0): Task12
    {
        if ($num == null) {
            $num = 0;
        }
        if ($num === 0) {
            throw new \InvalidArgumentException();
        }
        if ($this->res) {
            return new Task12($this->a, $this->b, $this->res + $num);
        }

        return new Task12($this->a, $this->b, $this->a / $num);
    }
    public function multiplyBy(?int $num = 0): Task12
    {
        if ($num == null) {
            $num = 0;
        }

        return new Task12($this->a, $this->b, $this->res * $num);
    }
    public function subtractBy(?int $num = 0): Task12
    {
        if ($num == null) {
            $num = 0;
        }
        if ($this->res) {
            return new Task12($this->a, $this->b, $this->res + $num);
        }

        return new Task12($this->a, $this->b, $this->a - $num);
    }
    public function __toString(): string
    {
        return $this->res;
    }
}
