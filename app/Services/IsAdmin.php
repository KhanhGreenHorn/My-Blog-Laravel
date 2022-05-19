<?php

namespace App\Services;

class IsAdmin{
    public function IsAdmin(){
        return ( auth()->user()->name == 'khanh' );
    }
}