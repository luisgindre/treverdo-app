<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'user_id',
        'enabled',
        'password',
        'cell_phone',
        'company_id',
        'company_position',
        'work_phone',
        'work_mail',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@hotmail.com') && $this->hasVerifiedEmail();
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    
    
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class,'module_role_user')->withPivot('module_id')->withTimestamps();
    }
    
    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class,'module_role_user');
    }

    public function getFullNameAttribute()
    {
        return $this->last_name . ', ' . $this->name ;
    }
}
