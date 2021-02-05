<?php

namespace App\Traits;


Trait Jsonable
{
    public function fromJson($data)
    {
        return json_decode($data, true);
    }

    public function toJson($data)
    {
        return json_encode($data, true);
    }
}
