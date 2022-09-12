<?php

namespace src;

class Task1
{
    public function main(int $number): string
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException();
        }
        $returnValue = ($number <= 10) ? 'Equal or less than 10' : '';
        $returnValue = ($number > 10) ? 'More than 10' : $returnValue;
        $returnValue = ($number > 20) ? 'More than 20' : $returnValue;

        return ($number > 30) ? 'More than 30' : $returnValue;
    }
}
