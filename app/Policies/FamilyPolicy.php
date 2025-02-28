<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Family;
use Illuminate\Auth\Access\HandlesAuthorization;


class FamilyPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Family $family)
    {
        return $user->families()->where('family_id', $family->id)->exists();
    }

    public function manage(User $user, Family $family): bool
    {
        return $user->families()->where('family_id', $family->id)->wherePivot('is_owner', true)->exists();
    }

    public function generateInvitation(User $user, Family $family): bool
    {
        return $user->families()->where('family_id', $family->id)->wherePivot('is_owner', true)->exists();
    }

}
