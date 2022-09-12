<?php

namespace src;

class Task3
{
    public function main($number): int
    {
        if (!is_int($number) || $number <= 9) {
            throw new \InvalidArgumentException();
        }
        while (!($number / 10 < 1)) {
            $number = array_sum(str_split($number));
        }

        return $number;
    }
}
