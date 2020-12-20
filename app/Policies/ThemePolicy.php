<?php

namespace App\Policies;

use App\User;
use App\theme;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThemePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any themes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the theme.
     *
     * @param  \App\User  $user
     * @param  \App\theme  $theme
     * @return mixed
     */
    public function view(User $user, theme $theme)
    {
        //
    }

    /**
     * Determine whether the user can create themes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the theme.
     *
     * @param  \App\User  $user
     * @param  \App\theme  $theme
     * @return mixed
     */
    public function update(User $user, theme $theme)
    {
        return $user->id === $theme->user_id;
    }

    /**
     * Determine whether the user can delete the theme.
     *
     * @param  \App\User  $user
     * @param  \App\theme  $theme
     * @return mixed
     */
    public function delete(User $user, theme $theme)
    {
        return $user->id === $theme->user_id;
    }

    /**
     * Determine whether the user can restore the theme.
     *
     * @param  \App\User  $user
     * @param  \App\theme  $theme
     * @return mixed
     */
    public function restore(User $user, theme $theme)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the theme.
     *
     * @param  \App\User  $user
     * @param  \App\theme  $theme
     * @return mixed
     */
    public function forceDelete(User $user, theme $theme)
    {
        //
    }
}
