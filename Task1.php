<?php

namespace src;

class Task1{

    public function main(int $number) : string
    {
        $returnValue = ($number <= 10) ? "Equal or less than 10" : "" ;
        $returnValue = ($number > 10) ? "More than 10" : $returnValue ;
        $returnValue = ($number > 20) ? "More than 20" : $returnValue ;
        $returnValue = ($number > 30) ? "More than 30" : $returnValue;

        return $returnValue;
    }
}