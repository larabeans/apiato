<?php

namespace App\Containers\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

class FindUserByIdRequest extends Request
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'search-users',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => 'required|exists:users,id'
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess|isOwner',
        ]);
    }
}
