<?php 

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface  UserInterface 
{

    public function getAllUser() : Collection;
}
