<?php

namespace src;

class Task8
{
    public function main(string $json): string
    {
        $result = '';
        $var = json_decode($json, true, 512, JSON_OBJECT_AS_ARRAY);
        if (!$var || !is_array($var)) {
            throw new \InvalidArgumentException();
        }
        foreach ($var as $key => $value) {
            if (is_array($value)) {
                $result .= $this->main(json_encode($value));
            } else {
                if (is_int($value)) {
                    throw new \InvalidArgumentException();
                }
                $result .= $key . ': ' . $value . "\r\n";
            }
        }

        return $result;
    }
}
