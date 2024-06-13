<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, CrudTrait, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the employment requests for the user.
     */
    public function employmentRequests(): HasMany
    {
        return $this->hasMany(EmploymentRequest::class);
    }

    /**
     * Get the volunteering requests for the user.
     */
    public function volunteeringRequests(): HasMany
    {
        return $this->hasMany(VolunteeringRequest::class);
    }

    /**
     * Get the membership requests for the user.
     */
    public function membershipRequests(): HasMany
    {
        return $this->hasMany(MembershipRequest::class);
    }

    /**
     * Get the initiative registrations for the user.
     */
    public function initiativeRegistrations(): HasMany
    {
        return $this->hasMany(InitiativeRegistration::class);
    }

    /**
     * Check if the user subscribed to the mailing list.
     */
    public function subscribedToMailingList(): bool
    {
        return MailingListSubscriber::where('email', $this->email)->exists();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\Auth\ResetPasswordNotification($token));
    }
}
