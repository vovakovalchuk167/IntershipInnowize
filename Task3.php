<?php

namespace src;

class Task3
{
    public function main(int $number): int
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException();
        }
        while (!($number / 10 < 1)) {
            $number = array_sum(str_split($number));
        }

        return $number;
    }
}

