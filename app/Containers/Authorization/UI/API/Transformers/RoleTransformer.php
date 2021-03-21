<?php

namespace App\Containers\Authorization\UI\API\Transformers;

use App\Containers\Authorization\Models\Role;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Collection;

class RoleTransformer extends Transformer
{
    protected $availableIncludes = [

    ];

    protected $defaultIncludes = [
        'permissions'
    ];

    public function transform(Role $role): array
    {
        return [
            'object' => 'Role',
            'id' => $role->getHashedKey(), // << Unique Identifier
            'name' => $role->name, // << Unique Identifier
            'description' => $role->description,
            'display_name' => $role->display_name,
            'level' => $role->level,
        ];
    }

    public function includePermissions(Role $role): Collection
    {
        return $this->collection($role->permissions, new PermissionTransformer());
    }
}
