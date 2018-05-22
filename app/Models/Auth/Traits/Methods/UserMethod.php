<?php

namespace App\Models\Auth\Traits\Methods;

trait UserMethod
{
    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->hasRole(config('auth.access.users.roles.admin'));
    }

    public function isUser()
    {
        return $this->hasRole(config('auth.access.users.roles.user'));
    }
}
