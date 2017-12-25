<?php

namespace App;

use App\Like;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['author', 'name', 'body', 'image'];

    /**
     * A post belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *  Relationship between Post and Likes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    /**
     *  Return true if record exists.
     *
     * @return bool
     */
    public function isLiked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    /**
     * Return true if matches.
     *
     * @return bool
     */
    public function isFirstLiked()
    {
        return $this->likes->first()->user_id == auth()->id();
    }
}
