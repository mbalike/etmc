<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'birthdate',
        'gender',
        'marital_status',
        'spouse_id',
        'family_id',
        'supervisor_id'
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function spouse(): BelongsTo
    {
        return $this->BelongsTo(Member::class, 'spouse_id');
    }

    public function spouseOf(): HasOne
    {
        return $this->hasOne(Member::class, 'spouse_id');
    }

    public function family(): BelongsTo
    {
        return $this->BelongsTo(Family::class);
    }

    public function headOfFamily(): HasOne
    {
        return $this->hasOne(Family::class, 'head_id');
    }

    public function supervisor(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'supervisor_id');
    }

    public function death(): HasOne 
    {
        return $this->hasOne(Death::class);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function motherOf(): HasMany
    {
        return $this->HasMany(Teenager::class, 'mother_id');
    }

    public function fatherOf(): HasMany
    {
        return $this->HasMany(Teenager::class, 'father_id');
    }

    public function baptism(): HasOne
    {
        return $this->HasOne(Baptism::class,'member_id');
    }
}
