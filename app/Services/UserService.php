<?php 

namespace App\Services;

use App\Interfaces\UserInterface;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserInterface 
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUser(): Collection
    {
        return $this->userRepository->getAll();
    }
}