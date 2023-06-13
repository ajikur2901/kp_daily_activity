<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'project_id',
        'status_id'
    ];

    /**
     * Get the project associated with the activity.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Projects::class);
    }

    /**
     * Get the project associated with the activity.
     */
    public function workStatus(): HasOne
    {
        return $this->hasOne(ActivityStatus::class)->where('status_id', 2);
    }
}
