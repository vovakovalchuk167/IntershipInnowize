<?php

namespace src;

class Task7
{
    public function main(array $arr, int $position): array
    {
        if ($position < 0) {
            throw new \InvalidArgumentException();
        }
        for ($i = $position; $i < count($arr) - 1; $i++) {
            $arr[$i] = $arr[$i + 1];
        }

        return array_slice($arr, 0, count($arr) - 1);
    }
}

