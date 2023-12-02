<?php

namespace Modules\User\Entities\V1\User;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait UserRelations
{
    /**
     * Get the user's profile
     *
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(v1_profile()->model());
    }

    /**
     * Get the user's projects
     *
     * @return BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(v1_project()->model());
    }
}
