<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public const ROLE_ADMIN = 'admin';
    public const ROLE_USER = 'user';
    public const ROLE_ACTIVITES_RESSOURCES = 'activites_ressources';
    public const ROLE_RADIO_MARIA = 'radio_maria';
    public const ROLE_MANAGER_DONNEES = 'manager_donnees';
    public const ROLE_SECRETARIAT = 'secretariat';
    public const ROLE_ZELATEUR = 'zelateur';
    public const ROLE_TRESORERIE = 'tresorerie';

    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
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
        'email',
        'password',
        'role',
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
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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

    public function hasRole(array|string $roles): bool
    {
        return in_array($this->role, (array) $roles, true);
    }

    public function canAccess(string $area): bool
    {
        if ($this->hasRole(self::ROLE_ADMIN)) {
            return true;
        }

        $permissions = [
            'activities_resources' => [self::ROLE_ACTIVITES_RESSOURCES, self::ROLE_USER],
            'radio_maria' => [self::ROLE_RADIO_MARIA],
            'data_management' => [self::ROLE_MANAGER_DONNEES, self::ROLE_USER],
            'messages' => [self::ROLE_MANAGER_DONNEES, self::ROLE_USER],
            'documents' => [self::ROLE_SECRETARIAT, self::ROLE_ZELATEUR],
            'stock' => [self::ROLE_ZELATEUR],
            'finance' => [self::ROLE_TRESORERIE, self::ROLE_ZELATEUR],
            'users' => [self::ROLE_ZELATEUR],
            'sliders' => [self::ROLE_ZELATEUR, self::ROLE_ACTIVITES_RESSOURCES],
        ];

        return in_array($this->role, $permissions[$area] ?? [], true);
    }

    public function roleLabel(): string
    {
        return [
            self::ROLE_ADMIN => 'Administrateur',
            self::ROLE_USER => 'Utilisateur',
            self::ROLE_ACTIVITES_RESSOURCES => 'Activites et ressources',
            self::ROLE_RADIO_MARIA => 'Radio Maria',
            self::ROLE_MANAGER_DONNEES => 'Gestion des donnees',
            self::ROLE_SECRETARIAT => 'Secretariat',
            self::ROLE_ZELATEUR => 'Zelateur',
            self::ROLE_TRESORERIE => 'Tresorerie',
        ][$this->role] ?? 'Utilisateur';
    }
}
