<?php

namespace App\Policies;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Imparts;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditPolicy {
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {}

    public function edit(User $user, Teacher|ClassRoom|Classes|Imparts $model) {
        foreach ($user->roles as $role) {
            if($role->name === 'edit')
                return true;
        }
        return false;
    }
}
