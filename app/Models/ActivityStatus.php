<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityStatus extends Model
{
    use HasFactory;
    protected $table = 'activity_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'activity_id',
        'status_id',
        'is_active',
        'start',
        'end',
    ];

    /**
     * Get the project associated with the activity.
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
}
