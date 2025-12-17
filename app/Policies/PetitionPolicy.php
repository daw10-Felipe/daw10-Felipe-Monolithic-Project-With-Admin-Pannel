<?php

namespace App\Policies;

use App\Models\Petition;
use App\Models\User;

class PetitionPolicy
{
    public function before(User $user, string $ability)
    {
        if ($user->role_id == 2) {
            return true;
        }
    }

    public function view(User $user, Petition $petition): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Petition $petition): bool
    {
        if ($user->role_id == 1 && $petition->user_id == $user->id) {
            return true;
        }
        return false;
    }

    public function delete(User $user, Petition $petition): bool
    {
        if ($user->role_id == 1 && $petition->user_id == $user->id) {
            return true;
        }
        return false;
    }
}
