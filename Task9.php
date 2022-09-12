<?php

namespace src;

class Task9
{
    public function main(array $arr, int $n): array
    {
        $result = [];
        for ($i = 0; $i < count($arr) - 2; $i++) {
            if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] === $n) {
                $result[] = $arr[$i] . ' + ' . $arr[$i + 1] . ' + ' . $arr[$i + 2] . ' = ' . $n;
            }
        }

        return $result;
    }
}
