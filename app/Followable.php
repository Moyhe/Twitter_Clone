<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Followable
{

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        return $this->follows()->toggle($user);
    }

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id);
    }

    /**
     * The follows that belong to the Followable
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }
}
