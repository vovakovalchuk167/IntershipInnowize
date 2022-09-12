<?php

namespace src;

class Task9
{
    public function main(array $arr, int $n): array
    {
        if ($n <= 0) {
            throw new \InvalidArgumentException();
        }
        foreach ($arr as $ar) {
            if ($ar < 0) {
                throw new \InvalidArgumentException();
            }
        }
        $result = [];
        for ($i = 0; $i < count($arr) - 2; $i++) {
            if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] === $n) {
                $result[] = $arr[$i] . ' + ' . $arr[$i + 1] . ' + ' . $arr[$i + 2] . ' = ' . $n;
            }
        }
        if (sizeof($result) === 0) {
            throw new \InvalidArgumentException();
        }

        return $result;
    }
}
