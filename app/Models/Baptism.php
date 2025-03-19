<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Baptism extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [

        'member_id',
        'phone',
        'occupation',
        'description',
        'baptism_date',
        'baptised_by',
        'testified_by',
        'supervisor_id',
        'status',
    ];

    protected $casts = [
       
    'baptism_date' => 'date'

    ];


    public function member(): BelongsTo
    {
        return $this->BelongsTo(Member::class);
    }

    public function supervisor(): BelongsTo
    {
        return $this->BelongsTo(User::class,'supervisor_id');
    }

}
