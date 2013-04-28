<?php

namespace DeepCompare;

class Comparer
{
    public function compare($array1, $array2, $result = array())
    {
        foreach ($array1 as $key1 => $value1) {
            if (!array_key_exists($key1, $array2)) {
                if (is_array($value1)) {
                    $value1 = 'Array(...)';
                }
                $result[$key1] = array(
                    'In old but not in new version',
                    $value1
                );
            }
        }
        return $result;
    }
}
