<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const ACTIVITY_TODO = 1;
    const ACTIVITY_WIP = 2;
    const ACTIVITY_DONE = 3;
    use HasFactory;

    protected $table = 'status';
}
