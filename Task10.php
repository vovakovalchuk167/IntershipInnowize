<?php

namespace src;

class Task10
{
    public function main(int $n): array
    {
        if ($n <= 0) {
            throw new \InvalidArgumentException();
        }
        $result[] = $n;
        while ($n !== 1) {
            if ($n % 2 === 0) {
                $n /= 2;
            } else {
                $n = ($n * 3) + 1;
            }
            $result[] = $n;
        }

        return $result;
    }
}
