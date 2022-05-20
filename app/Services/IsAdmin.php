<?php

namespace App\Services;

class IsAdmin
{
    public function IsAdmin()
    {
        return (auth()->user()->email == 'puchapu10@gmail.com');
    }
}
