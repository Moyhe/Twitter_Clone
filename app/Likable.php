<?php

namespace App;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait Likable
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }


    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDisLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    /**
     * Get all of the likes for the Likable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }


    public function disLike($user = null)
    {
        $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {

        $model = $this->likes()
            ->getQuery()
            ->where('user_id', $user->id)
            ->orWhere('tweet_id', $this->id)
            ->first();


        if (!$model) {

            $this->likes()->updateOrCreate(
                [
                    'user_id' =>  $user ? $user->id : auth()->id()
                ],
                [
                    'liked' => $liked
                ]
            );

            return;
        }

        if ($liked && $model->liked || !$liked && !$model->liked) {
            $model->delete();
        } else {
            $model->liked = $liked;
            $model->save();
        }
    }
}
