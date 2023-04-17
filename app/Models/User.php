<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
}
