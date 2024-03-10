<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository{
    private $userModel;
    public function __construct(User $user)
    {
        $this->userModel = $user;        
    }

    public function getAll(){
        return $this->userModel->all();
    }
}