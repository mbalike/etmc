<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquen\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    private $fillable = [

        'title',
        'description',
        'event_date',
        'event_time',
        'location',
        'reminder_intervals',
        'filters'
        
    ];

    protected $casts = [

        'reminder_intervals' => 'array',
        'filters' => 'array',
    ];
}
