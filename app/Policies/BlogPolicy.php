<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    //Handle blogController Authorization here.
    public function delete(User $user, Blog $blog)
    {
        return $user->id === $blog->user->id or $user->is_admin;
    }

    public function update(User $user, Blog $blog)
    {
        return $user->id === $blog->user->id;
    }
}
