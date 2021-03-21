<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Actions\Action;

class GetAllAdminsAction extends Action
{
    public function run()
    {
        return Apiato::call('User@GetAllUsersTask',
            [],
            [
                'admins',
                'ordered',
            ]
        );
    }
}
