<?php

namespace App\Http\Helpers;

class Lookups
{
    static function format( $data, $keyName = 'id', $keyValue = 'name' )
    {
        $result = [];
        foreach ($data as $value) {
            $result[$value->$keyName] = $value->$keyValue;
        }
        return $result;
    }
}
