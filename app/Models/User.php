<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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
