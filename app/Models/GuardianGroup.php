<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GuardianGroup extends Model
{
    use Searchable;
    
    protected $fillable = [
        'zip_code',
        'group_name',
        'status',
    ];

    public function members() :BelongsToMany
    {
        return $this->belongsToMany(User::class, 'guardian_group_user')->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->whereStatus('active');
    }
}
