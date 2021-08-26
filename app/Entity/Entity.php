<?php
namespace App\Entity;

class Entity
{
    protected $id;
    public function getId()
    {
        return $this->id;
    }
    function toArray($except = [])
    {
        $result = [];
        foreach ($this as $key => $value) {
            if(in_array($key, $except)) continue;
            $result[$key] =  $value;
        }
        return $result;
    }
}
