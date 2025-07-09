<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuardianGroup extends Model
{
    use HasFactory, Searchable;
    
    protected $fillable = [
        'zip_code',
        'group_name',
        'status',
        'people_helped_count'
    ];

    /**
     * Get the options for a searchable model.
     * This method allows you to configure Meilisearch index settings directly from your model.
     *
     * @return array
     */
    public function searchableOptions(): array
    {
        return [
            'filterableAttributes' => ['status'],
        ];
    }

    public function members() :BelongsToMany
    {
        return $this->belongsToMany(User::class, 'guardian_group_user')->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->whereStatus('active');
    }
}
