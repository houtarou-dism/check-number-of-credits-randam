<?php

namespace App\Http\Controllers\Random;

use App\Http\Controllers\Controller;

class RandomController extends Controller
{
    public function random()
    {
        return view('random.top');
    }
}
