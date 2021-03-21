<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;

class GetAuthenticatedUserAction extends Action
{
    public function run(): User
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        if (!$user) {
            throw new NotFoundException();
        }

        return $user;
    }
}
