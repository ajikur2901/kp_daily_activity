<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

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
        'status_id',
        'start',
        'finish',
        'user_id'
    ];

    protected $attributes = array(
        'status_id' => Status::ACTIVITY_TODO,
    );

    /**
     * Get the project associated with the activity.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the project associated with the activity.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the project associated with the activity.
     */
    public function workStatus(): HasOne
    {
        return $this->hasOne(ActivityStatus::class)->where('status_id', 2);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($activity) {
            $activity->user_id = Auth::id();
        });
    }
}
