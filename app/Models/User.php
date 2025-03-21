<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role_id',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function supervisedMembers(): HasMany
    {
        return $this->HasMany(Member::class, 'supervisor_id');

    }

    public function supervisedTeens(): HasMany
    {
        return $this->HasMany(Teenager::class, 'supervisor_id');
    }

    public function transferedMember(): HasMany
    {
        return $this->HasMany(Transfer::class);
    }

    public function role(): BelongsTo
    {
        return $this->BelongsTo(Role::class);
    }

    public function baptism(): HasMany
    {
        return $this->HasMany(Baptism::class);
    }

}
