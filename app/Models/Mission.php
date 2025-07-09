<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'icon',
        'points_reward',
    ];

    /**
     * The users that have completed this mission.
     */
    public function completedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'mission_user')->withTimestamps();
    }
}
