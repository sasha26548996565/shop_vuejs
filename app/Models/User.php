<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Searchable;

    protected $fillable = [
        'first_name',
        'patronymic',
        'last_name',
        'email',
        'password',
        'gender',
        'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const MALE = 0;
    public const FEMALE = 1;

    private static function getGenderValue(): array
    {
        return [
            self::MALE => 'Male',
            self::FEMALE => 'Female'
        ];
    }

    #[SearchUsingPrefix(['first_name', 'patronymic', 'last_name', 'address'])]
    #[SearchUsingFullText(['first_name', 'patronymic', 'last_name', 'address'])]
    public function toSearchableArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'patronymic' => $this->patronymic,
            'last_name' => $this->last_name,
            'address' => $this->address
        ];
    }

    public function genderTitle(): string
    {
        return self::getGenderValue()[$this->gender];
    }

    public function scopePublished(Builder $builder): void
    {
        $builder->where('is_published', true);
    }

    public function isDeleted(): bool
    {
        return $this->deleted_at ? true : false;
    }
}
